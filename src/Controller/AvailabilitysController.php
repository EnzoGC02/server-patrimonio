<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Availabilitys Controller
 *
 *
 * @method \App\Model\Entity\Availability[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AvailabilitysController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {

        $availabilitys = $this->Availabilitys->find('all')->contain(['Elements']);
        $this->set([
            'availabilitys'=>$availabilitys,
            '_serialize'=>[$availabilitys]
            ]);
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
        $availability = $this->Availabilitys->get($id, [
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
        $availability = $this->Availabilitys->newEntity();
        if ($this->request->is('post')) {
            $availability = $this->Availabilitys->patchEntity($availability, $this->request->getData());
            if ($this->Availabilitys->save($availability)) {
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
        $availability = $this->Availabilitys->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $availability = $this->Availabilitys->patchEntity($availability, $this->request->getData());
            if ($this->Availabilitys->save($availability)) {
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
        $availability = $this->Availabilitys->get($id);
        if ($this->Availabilitys->delete($availability)) {
            $this->Flash->success(__('The availability has been deleted.'));
        } else {
            $this->Flash->error(__('The availability could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
