<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Opportunities'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="opportunities form large-10 medium-9 columns">
    <?= $this->Form->create($opportunity) ?>
    <fieldset>
        <legend><?= __('Add Opportunity') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('content');
            echo $this->Form->input('excerpt');
            echo $this->Form->input('local');
            echo $this->Form->input('category');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
