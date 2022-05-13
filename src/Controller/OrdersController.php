<?php
declare(strict_types=1);

namespace App\Controller;
use App\Controller\Admin\AppController;
/**
 * Orders Controller
 *
 * @method \App\Model\Entity\Order[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OrdersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate=[
            'contain'=>[
                'Qoute'=>['Product', 'AddressState']
            ]
        ];
        $orders = $this->paginate($this->Orders);
        $this->set(compact('orders'));
    }

    /**
     * View method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $order = $this->Orders->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('order'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $order = $this->Orders->newEmptyEntity();
        $isLogin = $this->Auth->user();
        if ($this->request->is('get')) {

            $qoute_id = $this->request->getAttribute("params")['pass'][0];
            $total_Fee = $this->request->getAttribute("params")['pass'][1];
            if(!$isLogin){
               //return $this->redirect(['controller' => 'Users', 'action' => 'login', 'prefix'=>'Admin'],['redirect'=>'qoute/view/'.$qoute_id]);
               $url = '/admin/users/login?redirect=qoute/view/'.$qoute_id;
                return $this->redirect($url); //+$qoute_id
            }   

            date_default_timezone_set("Australia/Melbourne");
            $lists = array(
                'qoute_id' => $qoute_id,
                'total_fee' => $total_Fee,
                'date' => date("Y-m-d H:i:s",time())
            );
            $order = $this->Orders->patchEntity($order, $lists);
            // debug($lists);
            // debug($order);
            // debug($this->Orders->save($order));
            // exit;
            // $this->Orders->save($order);

            if ($this->Orders->save($order)) {
                $this->Flash->success(__('The order has been saved.'));
                return $this->redirect(['controller' => 'Pages','action' => 'display']);
            }
            // $this->Flash->error(__('The order could not be saved. Please, try again.'));
        }
        //$this->set(compact('order'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $order = $this->Orders->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $order = $this->Orders->patchEntity($order, $this->request->getData());
            if ($this->Orders->save($order)) {
                $this->Flash->success(__('The order has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The order could not be saved. Please, try again.'));
        }
        $this->set(compact('order'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $order = $this->Orders->get($id);
        if ($this->Orders->delete($order)) {
            $this->Flash->success(__('The order has been deleted.'));
        } else {
            $this->Flash->error(__('The order could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
