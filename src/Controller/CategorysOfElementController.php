<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CategoryOfElement Controller
 *
 *
 * @method \App\Model\Entity\CategoryOfElement[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CategorysOfElementController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $categorysOfElement = $this->paginate($this->CategorysOfElement->find());

        $this->set([
            'categorys'=>$categorysOfElement,
            '_serialize'=>['categorys']
        ]);
    }

    /**
     * View method
     *
     * @param string|null $id Category Of Element id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $categorysOfElement = $this->CategorysOfElement->get($id, [
            'contain' => ['TypesBenefitsOfUse']
        ]);

        $this->set([
            'categorys'=>$categorysOfElement,
            '_serialize'=>['categorys']
        ]);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $categoryOfElement = $this->CategorysOfElement->newEntity();
        if ($this->request->is('post')) {
            $categoryOfElement = $this->CategorysOfElement->patchEntity($categoryOfElement, $this->request->getData());
            if ($this->CategoryOfElement->save($categoryOfElement)) {
                $this->Flash->success(__('The category of element has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The category of element could not be saved. Please, try again.'));
        }
        $this->set(compact('categoryOfElement'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Category Of Element id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $categoryOfElement = $this->CategoryOfElement->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $categoryOfElement = $this->CategoryOfElement->patchEntity($categoryOfElement, $this->request->getData());
            if ($this->CategoryOfElement->save($categoryOfElement)) {
                $this->Flash->success(__('The category of element has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The category of element could not be saved. Please, try again.'));
        }
        $this->set(compact('categoryOfElement'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Category Of Element id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $categoryOfElement = $this->CategoryOfElement->get($id);
        if ($this->CategoryOfElement->delete($categoryOfElement)) {
            $this->Flash->success(__('The category of element has been deleted.'));
        } else {
            $this->Flash->error(__('The category of element could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function getForBenefit($id_ben){

        $response=$this->CategorysOfElement->find()->where(['id_benefit'=>$id_ben]);
               
        $this->set([
        'categorys'=>$response,
        '_serialize'=>['categorys']
        ]);
        //debug(func_get_args());
    }
}
