<x-layout>
    <div class="row mb-4">
        <div class="col-4">
            <x-admin-dashboard-sidebar />
        </div>
        <div class="col-6 mt-2">
            {{$slot}}
        </div>
    </div>
</x-layout>