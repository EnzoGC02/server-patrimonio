<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Availability Controller
 *
 *
 * @method \App\Model\Entity\Availability[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AvailabilityController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $availability = $this->paginate($this->Availability);

        $this->set(compact('availability'));
    }

    /**
     * View method
     *
     * @param string|null $id Availability id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $availability = $this->Availability->get($id, [
            'contain' => []
        ]);

        $this->set('availability', $availability);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $availability = $this->Availability->newEntity();
        if ($this->request->is('post')) {
            $availability = $this->Availability->patchEntity($availability, $this->request->getData());
            if ($this->Availability->save($availability)) {
                $this->Flash->success(__('The availability has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The availability could not be saved. Please, try again.'));
        }
        $this->set(compact('availability'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Availability id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $availability = $this->Availability->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $availability = $this->Availability->patchEntity($availability, $this->request->getData());
            if ($this->Availability->save($availability)) {
                $this->Flash->success(__('The availability has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The availability could not be saved. Please, try again.'));
        }
        $this->set(compact('availability'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Availability id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $availability = $this->Availability->get($id);
        if ($this->Availability->delete($availability)) {
            $this->Flash->success(__('The availability has been deleted.'));
        } else {
            $this->Flash->error(__('The availability could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
