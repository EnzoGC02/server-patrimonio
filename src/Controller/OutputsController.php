<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Error\Debugger;
use Cake\ORM\TableRegistry;

use function Psy\debug;

/**
 * Outputs Controller
 *
 *
 * @method \App\Model\Entity\Output[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OutputsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $outputs = $this->paginate($this->Outputs);

        $this->set([
            'outputs'=>$outputs,
            '_serialize'=>['outputs']
        ]);
    }

    /**
     * View method
     *
     * @param string|null $id Output id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $output = $this->Outputs->get($id, [
            'contain' => []
        ]);

        $this->set('output', $output);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $Elements=TableRegistry::get('Elements');
        $output = $this->Outputs->newEntity();
        if ($this->request->is('post')) {
            $output = $this->Outputs->patchEntity($output, $this->request->getData());
            if ($this->Outputs->save($output)) {
                $message="Exito";
                $query=$Elements->query();
                $query->update()
                       ->set(['quantity'=>'50'])
                       ->where(['id_element'=>$output->element_id])
                       ->execute();
            }
            else $message="Error";
        }
        $this->set([
            'message'=>$message,
            '_serialize'=>['message']
        ]);
    }

    /**
     * Edit method
     *
     * @param string|null $id Output id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $output = $this->Outputs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $output = $this->Outputs->patchEntity($output, $this->request->getData());
            if ($this->Outputs->save($output)) {
                $this->Flash->success(__('The output has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The output could not be saved. Please, try again.'));
        }
        $this->set(compact('output'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Output id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $output = $this->Outputs->get($id);
        if ($this->Outputs->delete($output)) {
            $this->Flash->success(__('The output has been deleted.'));
        } else {
            $this->Flash->error(__('The output could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
