<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Substeps Controller
 *
 * @property \App\Model\Table\SubstepsTable $Substeps
 *
 * @method \App\Model\Entity\Substep[] paginate($object = null, array $settings = [])
 */
class SubstepsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Steps']
        ];
        $substeps = $this->paginate($this->Substeps);

        $this->set(compact('substeps'));
        $this->set('_serialize', ['substeps']);
    }

    /**
     * View method
     *
     * @param string|null $id Substep id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $substep = $this->Substeps->get($id, [
            'contain' => ['Steps']
        ]);

        $this->set('substep', $substep);
        $this->set('_serialize', ['substep']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $substep = $this->Substeps->newEntity();
        if ($this->request->is('post')) {
            $substep = $this->Substeps->patchEntity($substep, $this->request->getData());
            if ($this->Substeps->save($substep)) {
                $this->Flash->success(__('The substep has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The substep could not be saved. Please, try again.'));
        }
        $steps = $this->Substeps->Steps->find('list', ['limit' => 200]);
        $this->set(compact('substep', 'steps'));
        $this->set('_serialize', ['substep']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Substep id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $substep = $this->Substeps->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $substep = $this->Substeps->patchEntity($substep, $this->request->getData());
            if ($this->Substeps->save($substep)) {
                $this->Flash->success(__('The substep has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The substep could not be saved. Please, try again.'));
        }
        $steps = $this->Substeps->Steps->find('list', ['limit' => 200]);
        $this->set(compact('substep', 'steps'));
        $this->set('_serialize', ['substep']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Substep id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $substep = $this->Substeps->get($id);
        if ($this->Substeps->delete($substep)) {
            $this->Flash->success(__('The substep has been deleted.'));
        } else {
            $this->Flash->error(__('The substep could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
