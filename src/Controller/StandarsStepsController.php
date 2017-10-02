<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * StandarsSteps Controller
 *
 * @property \App\Model\Table\StandarsStepsTable $StandarsSteps
 *
 * @method \App\Model\Entity\StandarsStep[] paginate($object = null, array $settings = [])
 */
class StandarsStepsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['StandarsLists']
        ];
        $standarsSteps = $this->paginate($this->StandarsSteps);

        $this->set(compact('standarsSteps'));
        $this->set('_serialize', ['standarsSteps']);
    }

    /**
     * View method
     *
     * @param string|null $id Standars Step id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $standarsStep = $this->StandarsSteps->get($id, [
            'contain' => ['StandarsLists']
        ]);

        $this->set('standarsStep', $standarsStep);
        $this->set('_serialize', ['standarsStep']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($stepsData = null)
    {
        $standarsStep = $this->StandarsSteps->newEntity();
        if (isset($stepsData)) {
            $standarsStep = $this->StandarsSteps->patchEntity($standarsStep, $stepsData);
            if ($this->StandarsSteps->saveMany($standarsStep)) {
                //$this->Flash->success(__('The standars step has been saved.'));
                return;
            }
            //$this->Flash->error(__('The standars step could not be saved. Please, try again.'));
        }
    }

    public function addSteps($stepsData = null)
    {
        if (isset($stepsData)) {
            $standarsStep = $this->StandarsSteps->newEntities($stepsData);
            if ($this->StandarsSteps->saveMany($standarsStep)) {
                return;
            }
            //$this->Flash->error(__('The standars step could not be saved. Please, try again.'));
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Standars Step id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $standarsStep = $this->StandarsSteps->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $standarsStep = $this->StandarsSteps->patchEntity($standarsStep, $this->request->getData());
            if ($this->StandarsSteps->save($standarsStep)) {
                $this->Flash->success(__('The standars step has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The standars step could not be saved. Please, try again.'));
        }
        $standarsLists = $this->StandarsSteps->StandarsLists->find('list', ['limit' => 200]);
        $this->set(compact('standarsStep', 'standarsLists'));
        $this->set('_serialize', ['standarsStep']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Standars Step id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        if ($this->StandarsSteps->deleteAll(['standar_list_id' => $id])) {
            //$this->Flash->success(__('The standars step has been deleted.'));
        } else {
            //$this->Flash->error(__('The standars step could not be deleted. Please, try again.'));
        }
        return;
    }
}
