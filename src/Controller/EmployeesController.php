<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Employees Controller
 *
 * @property \App\Model\Table\EmployeesTable $Employees
 *
 * @method \App\Model\Entity\Employee[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EmployeesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $employees = $this->paginate($this->Employees);

        $this->set(compact('employees'));
    }

    public function search() {
        if (!isset($this->request->query['Employees']['emp_name'])) {
            throw new BadRequestException();
        }

        $employees = $this->Employees->find('all', [
            'conditions' => ['Employees.emp_name LIKE'=> $this->request->query['Employees']['emp_name']],
            ])->first();

    //     if (!is_null($query)) {
    //         $this->Flash->error(__('Email ID already Exists!. Please, try again.'));
    //    } 

        //$query = $this->Employees->find()->where(['emp_name' => $this->request->query['Employees']['emp_name']]);
        // var_dump($query); exit;
        $this->set(compact('employees'));
        // $this->set('index', $employees);
    }

    /**
     * View method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $employee = $this->Employees->get($id, [
            'contain' => [],
        ]);

        $this->set('employee', $employee);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $employee = $this->Employees->newEntity();
        if ($this->request->is('post')) {
            
             $query = $this->Employees->find('list', [
                 'conditions' => ['Employees.email LIKE'=> $this->request->data['email']],
                 ])->first();

             if (!is_null($query)) {
                 $this->Flash->error(__('Email ID already Exists!. Please, try again.'));
            } 
            
            $employee = $this->Employees->patchEntity($employee, $this->request->getData());
            //Check if image has been uploaded
            if(!empty($this->request->data['emp_img']['name']))
            {
                    $file = $this->request->data['emp_img']; //put the data into a var for easy use

                    $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                    $arr_ext = array('jpg', 'jpeg', 'gif'); //set allowed extensions
                    // var_dump($arr_ext); exit;
                    //only process if the extension is valid
                    if(in_array($ext, $arr_ext))
                    {
                            //do the actual uploading of the file. First arg is the tmp name, second arg is 
                            //where we are putting it
                            move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/uploads/users/' . $file['name']);
                            // var_dump($employee->emp_img); exit;
                            //prepare the filename for database entry
                            $employee->emp_img = $file['name'];
                    }
            }
            if ($this->Employees->save($employee)) {
                $this->Flash->success(__('The employee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The employee could not be saved. Please, try again.'));
        }
        $this->set(compact('employee'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $employee = $this->Employees->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $employee = $this->Employees->patchEntity($employee, $this->request->getData());
            
            //Check if image has been uploaded
            if(!empty($this->request->data['upload']['name']))
            {
                    $file = $this->request->data['upload']; //put the data into a var for easy use

                    $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                    $arr_ext = array('jpg', 'jpeg', 'gif'); //set allowed extensions
                    // var_dump($arr_ext); exit;
                    //only process if the extension is valid
                    if(in_array($ext, $arr_ext))
                    {
                            //do the actual uploading of the file. First arg is the tmp name, second arg is 
                            //where we are putting it
                            move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/uploads/users/' . $file['name']);
                            // var_dump($employee->emp_img); exit;
                            //prepare the filename for database entry
                            $employee->emp_img = $file['name'];
                    }
            }
            if ($this->Employees->save($employee)) {
                $this->Flash->success(__('The employee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The employee could not be saved. Please, try again.'));
        }
        $this->set(compact('employee'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $employee = $this->Employees->get($id);
        if ($this->Employees->delete($employee)) {
            $this->Flash->success(__('The employee has been deleted.'));
        } else {
            $this->Flash->error(__('The employee could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
