<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TypesBenefitsOfUse Controller
 *
 *
 * @method \App\Model\Entity\TypesBenefitsOfUse[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TypesBenefitsOfUseController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $typesBenefitsOfUse = $this->paginate($this->TypesBenefitsOfUse);

        $this->set([
            'benefits'=>$typesBenefitsOfUse,
            '_serialize'=>['benefits']
        ]);
    }

    /**
     * View method
     *
     * @param string|null $id Types Benefits Of Use id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $typesBenefitsOfUse = $this->TypesBenefitsOfUse->get($id, [
            'contain' => []
        ]);

        $this->set([
            'benefit'=>$typesBenefitsOfUse,
            '_serialize'=>['benefit']
        ]);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $typesBenefitsOfUse = $this->TypesBenefitsOfUse->newEntity();
        if ($this->request->is('post')) {
            $typesBenefitsOfUse = $this->TypesBenefitsOfUse->patchEntity($typesBenefitsOfUse, $this->request->getData());
            if ($this->TypesBenefitsOfUse->save($typesBenefitsOfUse)) {
                $message='saved';
            }
            else $message='error';
        }
        $this->set([
            'message'=>$message,
            '_serialize'=>['message']
        ]);
        
    }

    /**
     * Edit method
     *
     * @param string|null $id Types Benefits Of Use id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $typesBenefitsOfUse = $this->TypesBenefitsOfUse->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $typesBenefitsOfUse = $this->TypesBenefitsOfUse->patchEntity($typesBenefitsOfUse, $this->request->getData());
            if ($this->TypesBenefitsOfUse->save($typesBenefitsOfUse)) {
                $this->Flash->success(__('The types benefits of use has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The types benefits of use could not be saved. Please, try again.'));
        }
        $this->set(compact('typesBenefitsOfUse'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Types Benefits Of Use id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $typesBenefitsOfUse = $this->TypesBenefitsOfUse->get($id);
        if ($this->TypesBenefitsOfUse->delete($typesBenefitsOfUse)) {
            $this->Flash->success(__('The types benefits of use has been deleted.'));
        } else {
            $this->Flash->error(__('The types benefits of use could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
