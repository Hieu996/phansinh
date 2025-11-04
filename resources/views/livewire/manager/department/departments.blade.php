<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">Bộ phận</flux:heading>
        <flux:subheading size="lg" class="mb-6">Quản lý các bộ phận trong tổ chức của bạn.
            <flux:spacer />
            <flux:button icon="plus" wire:click="addDepartment()">Thêm bộ phận</flux:button>
        </flux:subheading>

        <flux:separator variant="subtle" />
    </div>

    <div class="overflow-x-auto shadow-lg rounded-lg">
        <table class="min-w-full border-collapse bg-white">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase">STT</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase">Tên bộ phận</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase">Ngày tạo</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase">Thao tác</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">

                @forelse ($departments as $department)
                    <tr class="hover:bg-gray-100">
                        <td class="px-6 py-4 text-gray-700">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4 text-gray-700">{{ $department->name }}</td>
                        <td class="px-6 py-4 text-gray-700">{{ $department->created_at->format('m/d/Y') }}</td>
                        <td class="px-6 py-4 text-gray-700">
                            <flux:button variant="primary" wire:click="editDepartment({{ $department->id }})" color="zinc">Sửa</flux:button>
                            <flux:button variant="danger">Xóa</flux:button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-6 py-4 text-center text-gray-500">Không có bộ phận nào.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <livewire:manager.department.actions-department />

</div>
