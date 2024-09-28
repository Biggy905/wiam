<?php

namespace console\jobs;

use common\components\BaseJob;
use common\enums\OrderDelayWorkStatusEnum;
use common\enums\OrderIsApprovedStatusEnum;
use common\repositories\OrderDelayRepository;
use common\repositories\OrderRepository;
use common\repositories\UserRepository;
use DateTimeImmutable;
use Exception;
use Yii;

final class OrderDelayJob extends BaseJob
{
    public function exec(): void
    {
        $userRepository = new UserRepository();
        $orderRepository =new OrderRepository();
        $orderDelayRepository = new OrderDelayRepository();

        while (true) {
            echo "start, wait...\n";
            sleep(1);
            $orderDelay = $orderDelayRepository->findByStatusStartAndRepeat();
            if ($orderDelay) {
                echo "Number task: " . $orderDelay->id . "\n";
                echo "Time wait: " . $orderDelay->value . "\n";
                sleep($orderDelay->value);
                echo "Next step: handler!\n";

                $usersIsApproved = $userRepository->findAllWithOrderIsApproved();

                $listUserIsApproved = [];
                foreach ($usersIsApproved as $user) {
                    echo "Approved order, USER ID: " . $user['id'] . "\n";
                    $listUserIsApproved[] = $user['id'];
                }
                $listUserIsApproved = array_unique($listUserIsApproved);

                $orders = $orderRepository->findAllByUser($listUserIsApproved);
                $countOrder = count($orders);
                echo "Total order: " . $countOrder . "\n";

                $transaction = Yii::$app->db->beginTransaction();
                try {
                    foreach ($orders as $order) {
                        $status = OrderIsApprovedStatusEnum::STATUS_DECLINED->value;
                        $random = rand(1, 100);
                        if ($random >= 90) {
                            $status = OrderIsApprovedStatusEnum::STATUS_APPROVED->value;
                        }

                        $order->is_approved = $status;
                        $order->set_order_delay_id = $orderDelay->id;
                        $order->updated_at = (new DateTimeImmutable())->format('Y-m-d H:i:s');

                        $orderRepository->save($order);
                    }

                    $orderDelay->work = OrderDelayWorkStatusEnum::STATUS_REPEAT->value;
                    if (!empty($orders)) {
                        $orderDelay->work = OrderDelayWorkStatusEnum::STATUS_END->value;
                    }
                    $orderDelay->updated_at = (new DateTimeImmutable())->format('Y-m-d H:i:s');

                    $orderDelayRepository->save($orderDelay);

                    echo "The end! \n";
                    echo "Wait next handler!\n";
                    sleep(10);
                    $transaction->commit();
                } catch (Exception $exception) {
                    $transaction->rollBack();
                }
            } else {
                echo "Empty tasks! Repeat stage!\n\n\n";
                sleep(1);
            }
        }
    }
}
