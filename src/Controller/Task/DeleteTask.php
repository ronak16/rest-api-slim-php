<?php

namespace App\Controller\Task;

use Slim\Http\Request;
use Slim\Http\Response;

/**
 * Delete Task Controller.
 */
class DeleteTask extends BaseTask
{
    /**
     * Delete a task.
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function __invoke($request, $response, $args)
    {
        $this->setParams($request, $response, $args);
        $input = $this->getInput();
        $taskId = $this->args['id'];
        $userId = $input['decoded']->sub;
        $task = $this->getTaskService()->deleteTask($taskId, $userId);

        return $this->jsonResponse('success', $task, 204);
    }
}
