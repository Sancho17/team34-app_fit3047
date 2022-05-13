<?php
declare(strict_types=1);

namespace App\Controller;
use App\Controller\Admin\AppController;
/**
 * Qoute Controller
 *
 * @property \App\Model\Table\QouteTable $Qoute
 * @method \App\Model\Entity\Qoute[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class QouteController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Product','AddressState'],
        ];
        $qoute = $this->paginate($this->Qoute);
        $this->set(compact('qoute'));
    }

    /**
     * View method
     *
     * @param string|null $id Qoute id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Auth->user();
        $qoute = $this->Qoute->get($id, [
            'contain' => ['Product', 'Delivery', 'AddressState']
        ]);
        $this->set(compact('qoute','user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->setLayout('empty');
        $qoute = $this->Qoute->newEmptyEntity();
        $productId = null;
        if ($this->request->is('get')) {
            $productId = $this->request->getQuery('id');
        }
        if ($this->request->is('post')) {
            $qoute = $this->Qoute->patchEntity($qoute, $this->request->getData());
            // debug($qoute);
            // debug($this->Qoute->save($qoute));
            // exit;
            if ($this->Qoute->save($qoute)) {
                $this->Flash->success(__('The qoute has been saved.'));

                $order = $this->Qoute->save($qoute);
                // $this->view($order-id);
                return $this->redirect(['controller' => 'Qoute', 'action' => 'view', $order->id]);
            }
            $this->Flash->error(__('The qoute could not be saved. Please, try again.'));
        }
        $product = $this->Qoute->Product->find('list', ['limit' => 200])->all();
        $delivery = $this->Qoute->Delivery->find('list', ['limit' => 200])->all();
        $addressState = $this->Qoute->AddressState->find('list', ['limit' => 200])->all();
        $this->set(compact('qoute', 'product', 'delivery', 'addressState', 'productId'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Qoute id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $qoute = $this->Qoute->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $qoute = $this->Qoute->patchEntity($qoute, $this->request->getData());
            if ($this->Qoute->save($qoute)) {
                $this->Flash->success(__('The qoute has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The qoute could not be saved. Please, try again.'));
        }
        $product = $this->Qoute->Product->find('list', ['limit' => 200])->all();
        $this->set(compact('qoute', 'product'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Qoute id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $qoute = $this->Qoute->get($id);
        if ($this->Qoute->delete($qoute)) {
            $this->Flash->success(__('The qoute has been deleted.'));
        } else {
            $this->Flash->error(__('The qoute could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
