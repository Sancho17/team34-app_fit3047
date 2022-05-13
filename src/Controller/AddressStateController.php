<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * AddressState Controller
 *
 * @method \App\Model\Entity\AddressState[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AddressStateController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $addressState = $this->paginate($this->AddressState);

        $this->set(compact('addressState'));
    }

    /**
     * View method
     *
     * @param string|null $id Address State id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $addressState = $this->AddressState->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('addressState'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $addressState = $this->AddressState->newEmptyEntity();
        if ($this->request->is('post')) {
            $addressState = $this->AddressState->patchEntity($addressState, $this->request->getData());
            if ($this->AddressState->save($addressState)) {
                $this->Flash->success(__('The address state has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The address state could not be saved. Please, try again.'));
        }
        $this->set(compact('addressState'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Address State id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $addressState = $this->AddressState->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $addressState = $this->AddressState->patchEntity($addressState, $this->request->getData());
            if ($this->AddressState->save($addressState)) {
                $this->Flash->success(__('The address state has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The address state could not be saved. Please, try again.'));
        }
        $this->set(compact('addressState'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Address State id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $addressState = $this->AddressState->get($id);
        if ($this->AddressState->delete($addressState)) {
            $this->Flash->success(__('The address state has been deleted.'));
        } else {
            $this->Flash->error(__('The address state could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
