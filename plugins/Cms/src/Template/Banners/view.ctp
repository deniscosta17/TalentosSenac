<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Banner'), ['action' => 'edit', $banner->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Banner'), ['action' => 'delete', $banner->id], ['confirm' => __('Are you sure you want to delete # {0}?', $banner->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Banners'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Banner'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="banners view large-10 medium-9 columns">
    <h2><?= h($banner->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($banner->name) ?></p>
            <h6 class="subheader"><?= __('Type') ?></h6>
            <p><?= h($banner->type) ?></p>
            <h6 class="subheader"><?= __('Attachment') ?></h6>
            <p><?= h($banner->attachment) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($banner->id) ?></p>
        </div>
    </div>
</div>
