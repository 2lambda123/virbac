<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Controller\StandarsStepsController;

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
        $standarsSteps = $this->StandarsSteps->findAllByStandar_list_id($id);
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

                $steps = [];
                foreach ($standarsList['standars-steps'] as $step) {
                    $values = [ 'standar_list_id' => $standarsList->id, 'name' => $step ];
                    array_push($steps, $values);
                }

                (new StandarsStepsController())->addSteps($steps);

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

                $steps = [];
                foreach ($standarsList['standars-steps'] as $step) {
                    $values = [ 'standar_list_id' => $standarsList->id, 'name' => $step ];
                    array_push($steps, $values);
                }

                $stepController = new StandarsStepsController();
                $stepController->delete($standarsList->id);
                $stepController->addSteps($steps);

                $this->Flash->success(__('The standars list has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The standars list could not be saved. Please, try again.'));
        } 

        $this->loadModel('StandarsSteps');
        $standarsSteps = $this->StandarsSteps->findAllByStandar_list_id($id);
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
