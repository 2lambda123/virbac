<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\StandarsStep;
use Cake\Datasource\ConnectionManager;
/**
 * StandarsLists Controller
 *
 * @property \App\Model\Table\StandarsListsTable $StandarsLists
 *
 * @method \App\Model\Entity\StandarsList[] paginate($object = null, array $settings = [])
 */
class StandarsListsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $standarsLists = $this->paginate($this->StandarsLists);

        $this->set(compact('standarsLists'));
        $this->set('_serialize', ['standarsLists']);
    }

    /**
     * View method
     *
     * @param string|null $id Standars List id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $standarsList = $this->StandarsLists->get($id, [
            'contain' => []
        ]);
        $this->loadModel('StandarsSteps');
        $standarsSteps = $this->StandarsSteps->find()
                                            ->select(['id', 'name', 'substep_id'])
                                            ->where(['standar_list_id' => $id])
                                            ->order(['substep_id' => 'ASC']);

        $this->set(compact('standarsList', 'standarsSteps'));
        $this->set('_serialize', ['standarsList', 'standarsSteps']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $standarsList = $this->StandarsLists->newEntity();
        if ($this->request->is('post')) {
            $standarsList = $this->StandarsLists->patchEntity($standarsList, $this->request->getData());
            if ($this->StandarsLists->save($standarsList)) {
                foreach ($standarsList['data'] as $key => $step) {
                    $standarsList['data'][$key]['standar_list_id'] = $standarsList->id;
                }
                (new StandarsStepsController())->addSteps($standarsList['data']);

                $this->Flash->success(__('The standars list has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The standars list could not be saved. Please, try again.'));
        } 
        $this->set(compact('standarsList'));
        $this->set('_serialize', ['standarsList']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Standars List id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {   
        $standarsList = $this->StandarsLists->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $standarsList = $this->StandarsLists->patchEntity($standarsList, $this->request->getData());
            if ($this->StandarsLists->save($standarsList)) {
                foreach ($standarsList['data'] as $key => $step) {
                    $standarsList['data'][$key]['standar_list_id'] = $standarsList->id;
                }

                $stepController = new StandarsStepsController();
                $stepController->delete($standarsList->id);
                $stepController->addSteps($standarsList['data']);

                $this->Flash->success(__('The standars list has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The standars list could not be saved. Please, try again.'));
        } 

        $this->loadModel('StandarsSteps');
        $standarsSteps = $this->StandarsSteps->find()
                                            ->select(['id', 'name', 'substep_id'])
                                            ->where(['standar_list_id' => $id])
                                            ->order(['substep_id' => 'ASC']);

        $this->log($standarsSteps);
        $this->set(compact('standarsList', 'standarsSteps'));
        $this->set('_serialize', ['standarsList', 'standarsSteps']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Standars List id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $standarsList = $this->StandarsLists->get($id);
        if ($this->StandarsLists->delete($standarsList)) {
            $stepController = new StandarsStepsController();
            $stepController->delete($id);
            $this->Flash->success(__('The standars list has been deleted.'));
        } else {
            $this->Flash->error(__('The standars list could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
