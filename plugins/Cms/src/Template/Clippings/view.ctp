<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Clipping'), ['action' => 'edit', $clipping->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Clipping'), ['action' => 'delete', $clipping->id], ['confirm' => __('Are you sure you want to delete # {0}?', $clipping->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Clippings'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Clipping'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="clippings view large-10 medium-9 columns">
    <h2><?= h($clipping->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($clipping->name) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($clipping->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($clipping->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($clipping->modified) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Content') ?></h6>
            <?= $this->Text->autoParagraph(h($clipping->content)) ?>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Excerpt') ?></h6>
            <?= $this->Text->autoParagraph(h($clipping->excerpt)) ?>
        </div>
    </div>
</div>
