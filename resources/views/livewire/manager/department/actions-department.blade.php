<div>
    <flux:modal name="actions-department" class="md:w-96">
        <form wire:submit="{{  $isEditMode ? 'updateDepartment()' : 'createDepartment()' }}" class="space-y-6">
            <div>
                <flux:heading size="lg">{{ $isEditMode ? 'Cập nhật bộ phận' : 'Thêm bộ phận' }}</flux:heading>
                <flux:text class="mt-2">Quản lý bộ phận</flux:text>
            </div>

            <flux:input label="Bộ phận" placeholder="Điền tên bộ phận" wire:model="name"/>

            <div class="flex">
                <flux:spacer />

                <flux:button type="submit" variant="primary">{{ $isEditMode ? 'Cập nhật' : 'Thêm mới' }}</flux:button>
            </div>
        </form>
    </flux:modal>
</div>
