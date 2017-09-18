<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Product;

/**
 * JobsOrders Controller
 *
 * @property \App\Model\Table\JobsOrdersTable $JobsOrders
 *
 * @method \App\Model\Entity\JobsOrder[] paginate($object = null, array $settings = [])
 */
class JobsOrdersController extends AppController
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
        $jobsOrders = $this->paginate($this->JobsOrders);

        $this->set(compact('jobsOrders'));
        $this->set('_serialize', ['jobsOrders']);
    }

    /**
     * View method
     *
     * @param string|null $id Jobs Order id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $jobsOrder = $this->JobsOrders->get($id, [
            'contain' => ['StandarsLists']
        ]);

        $this->set('jobsOrder', $jobsOrder);
        $this->set('_serialize', ['jobsOrder']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $jobsOrder = $this->JobsOrders->newEntity();
        if ($this->request->is('post')) {
            $jobsOrder = $this->JobsOrders->patchEntity($jobsOrder, $this->request->getData());
            $jobsOrder['creation_date'] =  new \DateTime(date("Y-m-d"));
            if ($this->JobsOrders->save($jobsOrder)) {
                $this->Flash->success(__('The jobs order has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The jobs order could not be saved. Please, try again.'));
        }
        $standarsLists = $this->JobsOrders->StandarsLists->find('list', ['limit' => 200]);
        $this->set(compact('jobsOrder', 'standarsLists'));
        $this->set('_serialize', ['jobsOrder']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Jobs Order id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $jobsOrder = $this->JobsOrders->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $jobsOrder = $this->JobsOrders->patchEntity($jobsOrder, $this->request->getData());
            if ($this->JobsOrders->save($jobsOrder)) {
                $this->Flash->success(__('The jobs order has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The jobs order could not be saved. Please, try again.'));
        }
        $standarsLists = $this->JobsOrders->StandarsLists->find('list', ['limit' => 200]);
        $this->set(compact('jobsOrder', 'standarsLists'));
        $this->set('_serialize', ['jobsOrder']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Jobs Order id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $jobsOrder = $this->JobsOrders->get($id);
        if ($this->JobsOrders->delete($jobsOrder)) {
            $this->Flash->success(__('The jobs order has been deleted.'));
        } else {
            $this->Flash->error(__('The jobs order could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function inicio()
    {
        if ($this->request->is(['patch', 'post', 'put'])){
            $this->autoRender = false;
            $date =  new \DateTime(date($this->request->getData('date')));
            $jobsOrders = $this->JobsOrders->find()->where([
                'WEEK(creation_date)' => $date->format('W')
                ])->toArray();

            $this->response->header(['Content-type: application/json']);
            $this->response->body(json_encode($jobsOrders));
            return $this->response;
        }
        $this->paginate = [
            'contain' => ['StandarsLists']
        ];
        $jobsOrders = $this->paginate($this->JobsOrders);

        $this->set(compact('jobsOrders'));
        $this->set('_serialize', ['jobsOrders']);
    }

     public function getSku()
    {
        if ($this->request->is(['patch', 'post', 'put'])){
            $this->autoRender = false;
            $sku = $this->request->getData('sku');
            $this->log($this->request->getData('sku'));
            $this->loadModel('Products');
            $jobsOrders = $this->Products->find()->where([
                'sku' => $sku
                ])->toArray();
            $this->log($jobsOrders);
            $this->response->header(['Content-type: application/json']);
            $this->response->body(json_encode($jobsOrders));
            return $this->response;
        }
       
    }
}