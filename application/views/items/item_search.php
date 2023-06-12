<div class="row">
    <div class="col-md-12 table-responsive">
        <?php if ($items) :?>
        <table class="table table-striped table-hover shadow" id="table3">
            <thead>
            <tr>
                <th></th>
                <Th>Item</Th>
                <th>Code</th>
                <th>Supplier</th>
                <th>Unit Price</th>
                <th>Qty Available</th>
                <th>All Qty sold</th>
                <th>Description</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $i = 1;
            foreach($items as $item) :
            ?>
            <tr>
                <td><?=$i++?></td>
                <td><?=$item->name?></td>
                <td><?=$item->code?></td>
                <td><?=$item->supplier?></td>
                <td><?=number_format($item->unitPrice,0)?></td>
                <td><?=number_format($item->quantity, 0)?></td>
                <td><?=$this->session->admin_role === "Super" ? number_format(($item->qty_sold??0), 0) : 0?></td>
                <td><?=$item->description?></td>
            </tr>
            <?php
            endforeach;
            ?>
            </tbody>
        </table>
        <?php else:?>
            <div class="alert alert-info">No results for <b><?=$this->input->get('i')?></b></div>
        <?php endif;?>
    </div>
</div>

<script>
    $(document).ready( function () {
        $('#table3').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'excel', 'pdf', 'print'
            ]
        });
    } );
</script>