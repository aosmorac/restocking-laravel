<item :attributes="{{ $item }}" inline-template v-cloak>

    <div id="item-{{ $item->id }}" class="card">
        <div class="card-header">
            <h4 class="flex">{{ $item->name }}</h4>
            <strong>Amount: </strong><span v-text="amount"></span>, <strong>Status: </strong><span v-text="status"></span>
            @if(auth()->check())
                <button class="btn btn-xs mr-1" @click="editing = true">Edit</button>
            @endif
        </div>
        <div class="level update" v-if="editing">
            <strong>Amount: </strong>
            <input class="form-control" type="number" value="12" pattern="\d*" v-model="amount" >
            &nbsp;&nbsp;
            <strong>Status: </strong>
            <select class="form-control" v-model="status">
                <option value="need to restock">Need to Restock</option>
                <option value="have enough">Have Enough</option>
            </select>
            &nbsp;&nbsp;
            <button class="btn btn-xs btn-primary" @click="update">Update</button>
            &nbsp;&nbsp;
            <button class="btn btn-xs btn-link" @click="editing = false">Cancel</button>
        </div>
        <div class="card-body">
            {{ $item->description }}
        </div>
    </div>
</item>

