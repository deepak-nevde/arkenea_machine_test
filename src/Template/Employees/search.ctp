<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee[]|\Cake\Collection\CollectionInterface $employees
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Employee'), ['action' => 'add']) ?></li>
    </ul>
</nav>


<div class="employees index large-9 medium-8 columns content">
    <h3><?= __('Employees') ?></h3>


<?php 
    echo $this->Form->create('Employees', array('type' => 'get', 'url' => array('action' => 'search')));
    echo $this->Form->input('Employees.emp_name', array("placeholder"=>"Enter employee name to search end hit enter!",
)); ?>
<?= $this->Form->end()  ?>
    <?php
    // var_dump($employees['emp_name']); exit;
    ?>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort( 'emp_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('emp_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('phone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dob') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_img') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
                
            <tr>
                <td><?= $this->Number->format($employees->emp_id) ?></td>
                <td><?= h($employees['emp_name']) ?></td>
                <td><?= h($employees['address']) ?></td>
                <td><?= h($employees['email']) ?></td>
                <td><?= $this->Number->format($employees['phone']) ?></td>
                <td><?= h($employees['dob']) ?></td>
                <td><?php echo $this->Html->image('uploads/users/' . $employees->emp_img, array('style' => 'height:30px', 'width:25px')); ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $employees->emp_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $employees->emp_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $employees->emp_id], ['confirm' => __('Are you sure you want to delete # {0}?', $employees->emp_id)]) ?>
                </td>
            </tr>
           </tbody>
    </table>
</div>
