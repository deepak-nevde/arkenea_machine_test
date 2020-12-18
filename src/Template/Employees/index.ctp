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
   // echo $this->Form->input('Employees.emp_name'); 
    echo $this->Form->input('Employees.emp_name', array("placeholder"=>"Enter employee name to search end hit enter!",
)); ?>
<?= $this->Form->end()  ?>
    
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('emp_id') ?></th>
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
            <?php foreach ($employees as $employee): ?>
            <tr>
                <td><?= $this->Number->format($employee->emp_id) ?></td>
                <td><?= h($employee->emp_name) ?></td>
                <td><?= h($employee->address) ?></td>
                <td><?= h($employee->email) ?></td>
                <td><?= $this->Number->format($employee->phone) ?></td>
                <td><?= h($employee->dob) ?></td>
                <td><?php echo $this->Html->image('uploads/users/' . $employee->emp_img, array('style' => 'height:30px', 'width:25px')); ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $employee->emp_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $employee->emp_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $employee->emp_id], ['confirm' => __('Are you sure you want to delete # {0}?', $employee->emp_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
