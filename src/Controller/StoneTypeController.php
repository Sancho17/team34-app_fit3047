<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * StoneType Controller
 *
 * @property \App\Model\Table\StoneTypeTable $StoneType
 * @method \App\Model\Entity\StoneType[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StoneTypeController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $stoneType = $this->paginate($this->StoneType);

        $this->set(compact('stoneType'));
    }

    /**
     * View method
     *
     * @param string|null $id Stone Type id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $stoneType = $this->StoneType->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('stoneType'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $stoneType = $this->StoneType->newEmptyEntity();
        if ($this->request->is('post')) {
            $stoneType = $this->StoneType->patchEntity($stoneType, $this->request->getData());
            if ($this->StoneType->save($stoneType)) {
                $this->Flash->success(__('The stone type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stone type could not be saved. Please, try again.'));
        }
        $this->set(compact('stoneType'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Stone Type id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $stoneType = $this->StoneType->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $stoneType = $this->StoneType->patchEntity($stoneType, $this->request->getData());
            if ($this->StoneType->save($stoneType)) {
                $this->Flash->success(__('The stone type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stone type could not be saved. Please, try again.'));
        }
        $this->set(compact('stoneType'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Stone Type id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $stoneType = $this->StoneType->get($id);
        if ($this->StoneType->delete($stoneType)) {
            $this->Flash->success(__('The stone type has been deleted.'));
        } else {
            $this->Flash->error(__('The stone type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
