<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Opportunity'), ['action' => 'edit', $opportunity->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Opportunity'), ['action' => 'delete', $opportunity->id], ['confirm' => __('Are you sure you want to delete # {0}?', $opportunity->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Opportunities'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Opportunity'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="opportunities view large-10 medium-9 columns">
    <h2><?= h($opportunity->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($opportunity->name) ?></p>
            <h6 class="subheader"><?= __('Local') ?></h6>
            <p><?= h($opportunity->local) ?></p>
            <h6 class="subheader"><?= __('Category') ?></h6>
            <p><?= h($opportunity->category) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($opportunity->id) ?></p>
            <h6 class="subheader"><?= __('Excerpt') ?></h6>
            <p><?= $this->Number->format($opportunity->excerpt) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($opportunity->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($opportunity->modified) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Content') ?></h6>
            <?= $this->Text->autoParagraph(h($opportunity->content)) ?>
        </div>
    </div>
</div>
