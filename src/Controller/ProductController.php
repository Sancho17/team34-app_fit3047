<?php
declare(strict_types=1);

namespace App\Controller;
use App\Controller\Admin\AppController;
/**
 * Product Controller
 *
 * @property \App\Model\Table\ProductTable $Product
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $product = $this->paginate($this->Product);
        $user = $this->Auth->user();
        $this->set(compact('product','user'));
    }

    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $product = $this->Product->get($id, [
            'contain' => ['Category', 'StonetypeProduct'],
        ]);

        $this->set(compact('product'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->setLayout('empty');
        $product = $this->Product->newEmptyEntity();
        if ($this->request->is('post')) {
            $product = $this->Product->patchEntity($product, $this->request->getData());
            if ($this->Product->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $category = $this->Product->Category->find('list', ['limit' => 200])->all();
        $this->set(compact('product', 'category'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $product = $this->Product->get($id, [
            'contain' => ['Category'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $product = $this->Product->patchEntity($product, $this->request->getData());
            if ($this->Product->save($product)) {
                $this->Flash->success(__('The product has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $category = $this->Product->Category->find('list', ['limit' => 200])->all();
        $this->set(compact('product', 'category'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $product = $this->Product->get($id);
        if ($this->Product->delete($product)) {
            $this->Flash->success(__('The product has been deleted.'));
        } else {
            $this->Flash->error(__('The product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    public function detail()
    {
        $id = $this->request->getQuery('id');
        $user = $this->Auth->user();
        $product = $this->Product->get($id, [
            'contain' => [],
        ]);
        $this->set(compact('product','user'));


    }
}
