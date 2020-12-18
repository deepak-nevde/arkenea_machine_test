<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee $employee
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Employees'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="employees form large-9 medium-8 columns content">
    <!-- <? //= $this->Form->create($employee) ?> -->
    <?php echo $this->Form->create($employee, array('url' => array('action' => 'add'), 'enctype' => 'multipart/form-data')); ?>

    <fieldset>
        <legend><?= __('Add Employee') ?></legend>
        <?php
            echo $this->Form->control('emp_name');
            echo $this->Form->control('address');
            echo $this->Form->control('email');
            echo $this->Form->control('phone');
            echo $this->Form->control('dob');
            echo $this->Form->input('upload', array('type' => 'file'));
            
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
