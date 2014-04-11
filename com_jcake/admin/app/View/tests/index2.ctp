
<?php 
//works
echo $this->Form->create('Recipe',array('id'=>'adminForm')); 

?>
<?php
echo $this->Form->input('password'); // No div, no label
// has a label element
echo $this->Form->input(
    'username',
    array('label' => 'Username')
);
?>
<input name="task" type="hidden" value="tests.index3">
<input name="tasks" type="hidden" value="tests.index3">
<?php echo $this->Form->end('Finish'); ?>

<?php 
//works
echo $this->Form->create('User', array('type' => 'get'));
?>
<?php echo $this->Form->end('Finish'); ?>
    
    
<?php

echo $this->Html->link(
    'Enter',
    '/pages/home',
    array('class' => 'button', 'target' => '_blank')
);
echo $this->Html->link(
    'Dashboard',
    array(
        'controller' => 'dashboards',
        'action' => 'index2',
        'full_base' => true
    )
);
?>


<?php 

echo $this->Form->create(null, array(
    'url' => array('controller' => 'recipes', 'action' => 'add1','id'=>99)
));
?>
<?php echo $this->Form->end('Finish'); ?>









<!-- File: /app/View/Posts/index.ctp  (edit links added) -->

<h1>Blog posts</h1>
<p><?php echo $this->Html->link("Add Post", array('action' => 'add')); ?></p>
<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Action</th>
        <th>Created</th>
    </tr>

<!-- Here's where we loop through our $posts array, printing out post info -->

<?php foreach ($users as $user): ?>
    <tr>
        <td><?php echo $user['User']['id']; ?></td>
        <td>
            <?php
                echo $this->Html->link(
                    $user['User']['username'],
                    array('controller'=>'users','action' => 'view', 'id'=>$user['User']['id'])
                );
            ?>
        </td>
        <td>
            <?php
                echo $this->Html->link(
                    'Edit',
                    array('controller'=>'users','action' => 'edit', 'id'=>$user['User']['id'])
                );
            ?>
        </td>
        <td>
            <?php echo $user['User']['registerDate']; ?>
        </td>
    </tr>
<?php endforeach; ?>

</table>