<?php

namespace App\Controller;

use App\Controller\AppController;
use App\Controller\Query;
use Cake\Datasource\ConnectionManager;

/**
 * Elements Controller
 *
 *
 * @method \App\Model\Entity\Element[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ElementsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */

    public function index()
    {
        $Elements = $this->Elements->find('all')->contain(['CategorysOfElement.TypesBenefitsOfUse']);
        $this->set([
            'elements' => $Elements,
            '_serialize' => ['elements']
        ]);
    }

    /**
     * View method
     *
     * @param string|null $id Element id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */

    public function view($id = null)
    {

        $element = $this->Elements->get($id, ['contain' => ['CategorysOfElement.TypesBenefitsOfUse']]);

        $this->set([
            'element' => $element,
            '_serialize' => ['element']
        ]);
    }
    public function getElementsForTypeBenefit($id = null)
    {
        // $elements = $this->Elements->get($id, ['contain' => ['CategorysOfElement.TypesBenefitsOfUse']])->where('');
        $bd = ConnectionManager::get('default');
        $query = "SELECT id_element, name_element,description,quantity,category_id,name_category,id_benefit,name_benefit
                FROM elements
                JOIN categorys_of_element on category_id=id_category
                JOIN types_benefits_of_use ON id_benefit=id_type_benefit_of_use
                WHERE id_benefit={$id}";

        $elements = $bd->query($query)->fetchAll('assoc');
        $this->set([
            'elements' => $elements,
            '_serialize' => ['elements']
        ]);
    }
    public function getElementsForTypeBenefitt($id = null)
    {
        $id_benefit = $id;

        $elements = $this->Elements->find('all')->contain(
            [
                'CategorysOfElement.TypesBenefitsOfUse' =>
                function (Query $q) use ($id_benefit) {
                    return $q->where(['TypesBenefitsOfUse.id_type_benefit_of_use' => $id_benefit]);
                }
            ]

        );

        $this->set([
            'elements' => $elements,
            '_serialize' => ['elements']
        ]);
    }





    public function getAvailibityOfElement($id_elem = null)
    {

        $bd = ConnectionManager::get('default');
        $query = "SELECT availability_id, id_element,name_availability FROM elements
                JOIN elements_availability ON id_element=element_id
                JOIN availabilitys on availability_id=id_availability
                WHERE id_element={$id_elem}";
        $availabitys = $bd->query($query)->fetchAll('assoc');
        $this->set([
            'availabitys' => $availabitys,
            '_serialize' => ['availabitys']
        ]);
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $element = $this->Elements->newEntity($this->request->getData());
        $res = $this->Elements->save($element);
        if ($this->request->is(['post'])) {
            if ($res) {
                $message = 'saved';
            } else $message = 'error';
        }
        $this->set([
            'message' => $message,
            'element' => $element,
            '_serialize' => ['element', 'message']
        ]);
    }

    /**
     * Edit method
     *
     * @param string|null $id Element id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $element = $this->Elements->get($id);
        $this->request->allowMethod(['patch', 'post', 'put']);
            $element = $this->Elements->patchEntity($element, $this->request->getData());
            if ($this->Elements->save($element)) {
                $message = 'saved';
            } else $message = 'error';
        
        $this->set([
            'message' => $message,
            'element' => $element,
            '_serialize' => ['element', 'message']
        ]);
    }

    /**
     * Delete method
     *
     * @param string|null $id Element id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $element = $this->Elements->get($id);
        if ($this->Elements->delete($element)) {
            $this->Flash->success(__('The element has been deleted.'));
        } else {
            $this->Flash->error(__('The element could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function updateQuantity()
    {
        echo 'Hijo de puta';
    }
}
