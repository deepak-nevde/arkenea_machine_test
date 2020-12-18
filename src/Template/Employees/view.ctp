<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee $employee
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Employee'), ['action' => 'edit', $employee->emp_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Employee'), ['action' => 'delete', $employee->emp_id], ['confirm' => __('Are you sure you want to delete # {0}?', $employee->emp_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Employees'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Employee'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="employees view large-9 medium-8 columns content">
    <h3><?= h($employee->emp_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Emp Name') ?></th>
            <td><?= h($employee->emp_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($employee->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($employee->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Emp Id') ?></th>
            <td><?= $this->Number->format($employee->emp_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone') ?></th>
            <td><?= $this->Number->format($employee->phone) ?></td>
        </tr>
  
  
      <tr>
            <th scope="row"><?= __('Dob') ?></th>
            <td><?= h($employee->dob) ?></td>
        </tr>

        <tr>
            <th scope="row"><?= __('Image') ?></th>
           <td><?php echo $this->Html->image('uploads/users/' . $employee->emp_img, array('style' => 'height:200px', 'width:150px')); ?></td>
        </tr>

    </table>
</div>
