 <div id="paginate">
        <p><?php
            //echo $this->Paginator->counter(array(
            //'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
            //));
            ?>	</p>
        <div class="paging pull-right">
            <ul class="pagination">
                <li><?php echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled')); ?></li>
                <li><?php echo $this->Paginator->numbers(array('separator' => '')); ?></li>
                <li><?php echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled')); ?></li>
            </ul>
        </div>
    </div>
