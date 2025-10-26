\@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto py-8 px-4">
        <!-- Header Section -->
        <div class="mb-8 flex justify-between items-center">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Manage Services</h1>
            <div class="flex flex-wrap gap-3 mb-6">
                <button onclick="openCreateModal()" class="inline-flex items-center px-5 py-3 bg-gradient-to-r from-blue-600 to-blue-700 text-white font-semibold rounded-lg shadow-md hover:from-blue-700 hover:to-blue-800 transition-all duration-200 transform hover:-translate-y-0.5">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Add New Service
                </button>
                <a href="{{ route('admin.categories.index') }}" class="inline-flex items-center px-5 py-3 bg-gradient-to-r from-green-600 to-green-700 text-white font-semibold rounded-lg shadow-md hover:from-green-700 hover:to-green-800 transition-all duration-200 transform hover:-translate-y-0.5">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                    Manage Categories
                </a>
            </div>
        </div>

        @if(session('success'))
            <div class="mb-6 p-4 bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200 rounded-xl flex items-center shadow-sm">
                <div class="flex-shrink-0">
                    <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-green-800">{{ session('success') }}</p>
                </div>
            </div>
        @endif

        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gradient-to-r from-gray-50 to-blue-50">
                        <tr>
                            <th class="py-4 px-6 text-left font-semibold text-gray-700 text-sm uppercase tracking-wider border-b border-gray-200">Image</th>
                            <th class="py-4 px-6 text-left font-semibold text-gray-700 text-sm uppercase tracking-wider border-b border-gray-200">Name</th>
                            <th class="py-4 px-6 text-left font-semibold text-gray-700 text-sm uppercase tracking-wider border-b border-gray-200">Slug</th>
                            <th class="py-4 px-6 text-right font-semibold text-gray-700 text-sm uppercase tracking-wider border-b border-gray-200">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach($services as $service)
                            <tr class="hover:bg-blue-50 transition-colors duration-150 group">
                                <td class="py-4 px-6">
                                    <div class="flex items-center justify-center">
                                        @if($service->image)
                                            <img src="{{ asset('storage/' . $service->image) }}" 
                                                 alt="{{ $service->name }}" 
                                                 class="h-12 w-12 rounded-lg object-cover shadow-sm border border-gray-200"
                                                 onerror="handleImageError(this)"
                                                 onload="handleImageLoad(this)">
                                        @else
                                            <div class="h-12 w-12 bg-gray-100 rounded-lg flex items-center justify-center group-hover:bg-gray-200 transition-colors duration-150">
                                                <svg class="h-6 w-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                                </svg>
                                            </div>
                                        @endif
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-semibold text-gray-900">{{ $service->name }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800 font-mono">{{ $service->slug }}</span>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="flex justify-end space-x-2">
                                        <button type="button" 
                                                onclick="openEditModal({{ $service->id }})"
                                                class="inline-flex items-center px-3 py-2 bg-blue-50 text-blue-700 rounded-lg text-sm font-medium hover:bg-blue-100 hover:text-blue-800 transition-all duration-200 border border-blue-200 hover:border-blue-300 hover:shadow-sm">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                            </svg>
                                            Edit
                                        </button>
                                        <button type="button" 
                                                onclick="openDeleteModal({{ $service->id }}, '{{ addslashes($service->name) }}')"
                                                class="inline-flex items-center px-3 py-2 bg-red-50 text-red-700 rounded-lg text-sm font-medium hover:bg-red-100 hover:text-red-800 transition-all duration-200 border border-red-200 hover:border-red-300 hover:shadow-sm">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                            Delete
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if($services->count() === 0)
                <div class="text-center py-12 px-6">
                    <div class="mx-auto w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">No services found</h3>
                    <p class="text-gray-500 mb-6">Get started by creating your first service.</p>
                    <button onclick="openCreateModal()" class="inline-flex items-center px-5 py-3 bg-gradient-to-r from-blue-600 to-blue-700 text-white font-semibold rounded-lg shadow-md hover:from-blue-700 hover:to-blue-800 transition-all duration-200">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        Add New Service
                    </button>
                </div>
            @endif
        </div>

        @if(method_exists($services, 'hasPages') && $services->hasPages())
            <div class="mt-6 bg-white rounded-lg shadow-sm border border-gray-100 px-6 py-4">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-700">
                            Showing <span class="font-semibold">{{ $services->firstItem() }}</span> to 
                            <span class="font-semibold">{{ $services->lastItem() }}</span> of 
                            <span class="font-semibold">{{ $services->total() }}</span> results
                        </p>
                    </div>
                    <div>
                        {{ $services->links() }}
                    </div>
                </div>
            </div>
        @endif
    </div>

    <!-- Create Service Modal -->
    <div id="createModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-10 mx-auto p-5 border w-full max-w-2xl shadow-lg rounded-2xl bg-white">
            <div class="modal-content">
                <!-- Content will be loaded via AJAX -->
            </div>
        </div>
    </div>

    <!-- Edit Service Modal -->
    <div id="editModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-10 mx-auto p-5 border w-full max-w-2xl shadow-lg rounded-2xl bg-white">
            <div class="modal-content">
                <!-- Content will be loaded via AJAX -->
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-2xl bg-white">
            <div class="mt-3 text-center">
                <!-- Warning Icon -->
                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100 mb-4">
                    <svg class="h-6 w-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                    </svg>
                </div>
                
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Delete Service</h3>
                <p class="text-sm text-gray-500 mb-6">
                    Are you sure you want to delete "<span id="serviceName" class="font-semibold text-gray-900"></span>"? This action cannot be undone.
                </p>
                
                <div class="flex justify-center space-x-3">
                    <button id="cancelDelete" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg font-medium hover:bg-gray-400 transition-colors duration-200">
                        Cancel
                    </button>
                    <form id="deleteForm" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg font-medium hover:bg-red-700 transition-colors duration-200">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function handleImageError(img) {
            console.log('Image failed to load:', img.src);
            img.style.display = 'none';
            const placeholder = document.createElement('div');
            placeholder.className = 'h-12 w-12 bg-gray-100 rounded-lg flex items-center justify-center group-hover:bg-gray-200 transition-colors duration-150';
            placeholder.innerHTML = `
                <svg class="h-6 w-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
            `;
            img.parentNode.appendChild(placeholder);
        }

        function handleImageLoad(img) {
            console.log('Image loaded successfully:', img.src);
        }

        // Test image URLs in console
        document.addEventListener('DOMContentLoaded', function() {
            @foreach($services as $service)
                @if($service->image)
                    console.log('Testing image for {{ $service->name }}:', '{{ asset('storage/' . $service->image) }}');
                @endif
            @endforeach
        });

        function openCreateModal() {
            const modal = document.getElementById('createModal');
            const content = modal.querySelector('.modal-content');
            
            // Show loading state
            content.innerHTML = `
                <div class="flex justify-center items-center py-12">
                    <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-blue-600"></div>
                </div>
            `;
            
            modal.classList.remove('hidden');
            
            // Load the create form via AJAX
            fetch('{{ route('admin.services.create') }}')
                .then(response => response.text())
                .then(html => {
                    // Extract just the form content from the page
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, 'text/html');
                    const formSection = doc.querySelector('section.bg-white');
                    
                    if (formSection) {
                        // Create modal header and close button
                        content.innerHTML = `
                            <div class="p-6">
                                <div class="flex items-center justify-between mb-6">
                                    <h3 class="text-2xl font-bold text-gray-900">Add New Product</h3>
                                    <button type="button" onclick="closeModal('createModal')" class="text-gray-400 hover:text-gray-600 transition-colors">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                        </svg>
                                    </button>
                                </div>
                                ${formSection.innerHTML}
                            </div>
                        `;
                        
                        // Update the cancel link to close modal
                        const cancelLink = content.querySelector('a[href*="services.index"]');
                        if (cancelLink) {
                            cancelLink.href = 'javascript:void(0)';
                            cancelLink.onclick = () => closeModal('createModal');
                        }
                    }
                })
                .catch(error => {
                    content.innerHTML = '<div class="text-red-600 text-center py-12">Error loading form</div>';
                });
        }

        function openEditModal(serviceId) {
            const modal = document.getElementById('editModal');
            const content = modal.querySelector('.modal-content');
            
            // Show loading state
            content.innerHTML = `
                <div class="flex justify-center items-center py-12">
                    <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-blue-600"></div>
                </div>
            `;
            
            modal.classList.remove('hidden');
            
            // Load the edit form via AJAX
            fetch(`/admin/services/${serviceId}/edit`)
                .then(response => response.text())
                .then(html => {
                    // Extract just the form content from the page
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, 'text/html');
                    const formSection = doc.querySelector('section.bg-white');
                    
                    if (formSection) {
                        // Create modal header and close button
                        content.innerHTML = `
                            <div class="p-6">
                                <div class="flex items-center justify-between mb-6">
                                    <h3 class="text-2xl font-bold text-gray-900">Edit Product</h3>
                                    <button type="button" onclick="closeModal('editModal')" class="text-gray-400 hover:text-gray-600 transition-colors">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                        </svg>
                                    </button>
                                </div>
                                ${formSection.innerHTML}
                            </div>
                        `;
                        
                        // Update the cancel link to close modal
                        const cancelLink = content.querySelector('a[href*="services.index"]');
                        if (cancelLink) {
                            cancelLink.href = 'javascript:void(0)';
                            cancelLink.onclick = () => closeModal('editModal');
                        }
                    }
                })
                .catch(error => {
                    content.innerHTML = '<div class="text-red-600 text-center py-12">Error loading form</div>';
                });
        }

        function openDeleteModal(serviceId, serviceName) {
            const modal = document.getElementById('deleteModal');
            const serviceNameElement = document.getElementById('serviceName');
            const deleteForm = document.getElementById('deleteForm');
            const cancelButton = document.getElementById('cancelDelete');
            
            // Set the service name in the modal
            serviceNameElement.textContent = serviceName;
            
            // Set the form action - this is the key fix!
            deleteForm.action = `/admin/services/${serviceId}`;
            
            // Show the modal
            modal.classList.remove('hidden');
            
            // Close modal when cancel is clicked
            cancelButton.onclick = function() {
                modal.classList.add('hidden');
            };
            
            // Close modal when clicking outside
            modal.onclick = function(event) {
                if (event.target === modal) {
                    modal.classList.add('hidden');
                }
            };
            
            // Handle form submission - redirect on success
            deleteForm.onsubmit = function(e) {
                // The form will submit normally and redirect
                // No need for AJAX here since we want page reload
            };
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.add('hidden');
        }

        // Close modals when clicking outside
        document.addEventListener('click', function(e) {
            if (e.target.id === 'createModal' || e.target.id === 'editModal' || e.target.id === 'deleteModal') {
                e.target.classList.add('hidden');
            }
        });
    </script>
@endsection