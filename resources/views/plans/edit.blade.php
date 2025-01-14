
<x-tomato-admin-container container label="{{ __('Edit Plan')  . ' # ' . $model->id }}">

    <x-splade-form class="my-4 flex flex-col space-y-4" action="{{route('admin.plans.update', $model->id)}}" method="post" :default="$model">
        <x-splade-input name="name.ar" type="text" label="{{trans('tomato-subscription::global.plans.name')}} {{trans('tomato-subscription::global.lang.ar')}}"  placeholder="{{trans('tomato-subscription::global.plans.name')}} {{trans('tomato-subscription::global.lang.ar')}}" />
        <x-splade-input name="name.en" type="text" label="{{trans('tomato-subscription::global.plans.name')}} {{trans('tomato-subscription::global.lang.en')}}"  placeholder="{{trans('tomato-subscription::global.plans.name')}} {{trans('tomato-subscription::global.lang.en')}}" />
        <x-splade-textarea name="description.ar" label="{{trans('tomato-subscription::global.plans.description')}} {{trans('tomato-subscription::global.lang.ar')}}"  placeholder="{{trans('tomato-subscription::global.plans.description')}} {{trans('tomato-subscription::global.lang.ar')}}" autosize />
        <x-splade-textarea name="description.en" label="{{trans('tomato-subscription::global.plans.description')}} {{trans('tomato-subscription::global.lang.en')}}"  placeholder="{{trans('tomato-subscription::global.plans.description')}} {{trans('tomato-subscription::global.lang.en')}}" autosize />
        <x-splade-select name="invoice_interval" label="{{trans('tomato-subscription::global.plans.invoice_interval')}}"  placeholder="{{trans('tomato-subscription::global.plans.invoice_interval')}}" choices>
            <option value="day">{{trans('tomato-subscription::global.plans.invoice_intervals.day')}}</option>
            <option value="week">{{trans('tomato-subscription::global.plans.invoice_intervals.week')}}</option>
            <option value="month">{{trans('tomato-subscription::global.plans.invoice_intervals.month')}}</option>
            <option value="year">{{trans('tomato-subscription::global.plans.invoice_intervals.year')}}</option>
        </x-splade-select>
        <div class="flex justify-between">
            <x-splade-input class="w-full " name="invoice_period" type="number"  label="{{trans('tomato-subscription::global.plans.invoice_period')}}"  placeholder="{{trans('tomato-subscription::global.plans.invoice_period')}}" />
            <x-splade-input class="w-full ltr:ml-2 rtl:mr-2" name="price" type="number"  label="{{trans('tomato-subscription::global.plans.price')}}"  placeholder="{{trans('tomato-subscription::global.plans.price')}}" />
        </div>
        <x-splade-input type="text" name="order" label="{{trans('tomato-subscription::global.plans.order')}}"  placeholder="{{trans('tomato-subscription::global.plans.order')}}" />

        <x-tomato-color name="color" label="{{trans('tomato-subscription::global.plans.color')}}" />

        <div class="grid grid-cols-2 gap-2">
            <x-splade-checkbox name="is_recurring" label="{{trans('tomato-subscription::global.plans.is_recurring')}}"/>
            <x-splade-checkbox name="is_active" label="{{trans('tomato-subscription::global.plans.is_active')}}"/>
            <x-splade-checkbox name="is_free" label="{{trans('tomato-subscription::global.plans.is_free')}}"/>
            <x-splade-checkbox name="is_default" label="{{trans('tomato-subscription::global.plans.is_default')}}" />
        </div>
        <x-tomato-repeater :options="['feature', 'value']" type="repeater" id="features" name="features" label="{{trans('tomato-subscription::global.plans.features')}}">
            <div class="flex flex-col justify-center space-y-4">
                <x-splade-select option-label="name.{{app()->getLocale()}}" option-value="id" remote-root="model.data" remote-url="{{route('admin.plan-features.api')}}" v-model="repeater.main[key].feature"  label="{{trans('tomato-subscription::global.plans.feature')}}" placeholder="{{trans('tomato-subscription::global.plans.feature')}}"  />
                <x-splade-input v-model="repeater.main[key].value" name="value" type="text"  label="{{trans('tomato-subscription::global.plans.value')}}" placeholder="{{trans('tomato-subscription::global.plans.value')}}" />
            </div>
        </x-tomato-repeater>

        <x-splade-submit  label="{{ __('Update Plan') }}" :spinner="true" />
    </x-splade-form>

</x-tomato-admin-container>
