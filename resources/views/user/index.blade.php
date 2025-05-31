@extends('layouts.app')

@section('content')
  <div class="container py-5">
  <div class="row g-4 justify-content-center">
    
    <!-- Card 1 -->
    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
      <div class="card h-100 shadow">
        <img src="https://via.placeholder.com/400x260" class="card-img-top" alt="Product Image">
        <div class="card-body d-flex flex-column">
          <h5 class="card-title">Stylish Product</h5>
          <p class="text-success fw-bold fs-5">$39.99</p>
          <p class="card-text">Short product description with a few details.</p>
          <a href="#" class="btn btn-primary mt-auto">View Details</a>
        </div>
      </div>
    </div>

    <!-- Card 2 -->
    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
      <div class="card h-100 shadow">
        <img src="https://via.placeholder.com/400x260" class="card-img-top" alt="Product Image">
        <div class="card-body d-flex flex-column">
          <h5 class="card-title">Modern Design</h5>
          <p class="text-success fw-bold fs-5">$59.99</p>
          <p class="card-text">Elegant, durable, and modern look for your lifestyle.</p>
          <a href="#" class="btn btn-primary mt-auto">View Details</a>
        </div>
      </div>
    </div>

    <!-- Add more cards as needed -->

  </div>
</div>
<!-- Button to Open the Modal -->
<!-- Open Button -->
<button onclick="document.getElementById('taskModal').classList.remove('hidden')" class="bg-blue-600 text-white px-4 py-2 rounded">
    Launch Modal
</button>

<!-- Modal Component -->
<x-modal id="taskModal" title="Welcome!" form="taskForm">
  <form id="taskForm">
     <x-input
    name="title"
    label="Task Name"
    type="text"
    required
/>

<x-select
name="occurence"
label="Occurence"
:options="['Daily','Weekly','Monthly','Yearly']"
selected="daily"
>
</x-select>
  </form>
</x-modal>


@endsection
@push('scripts')
@endpush