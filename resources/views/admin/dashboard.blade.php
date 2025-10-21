@extends('layouts.app')

@section('title', 'Admin Dashboard - Medzfitt')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-8">Admin Dashboard</h1>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-gray-600 mb-2">Total Orders</h3>
            <p class="text-3xl font-bold text-blue-600">{{ $stats['total_orders'] }}</p>
        </div>
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-gray-600 mb-2">Pending Orders</h3>
            <p class="text-3xl font-bold text-yellow-600">{{ $stats['pending_orders'] }}</p>
        </div>
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-gray-600 mb-2">Total Products</h3>
            <p class="text-3xl font-bold text-green-600">{{ $stats['total_products'] }}</p>
        </div>
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-gray-600 mb-2">Total Customers</h3>
            <p class="text-3xl font-bold text-purple-600">{{ $stats['total_customers'] }}</p>
        </div>
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-gray-600 mb-2">Total Revenue</h3>
            <p class="text-3xl font-bold text-green-600">PKR {{ number_format($stats['total_revenue'], 2) }}</p>
        </div>
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-gray-600 mb-2">Today's Orders</h3>
            <p class="text-3xl font-bold text-blue-600">{{ $stats['today_orders'] }}</p>
        </div>
    </div>

    <!-- Quick Links -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
        <a href="{{ route('admin.products.index') }}" class="bg-blue-600 text-white p-4 rounded-lg text-center hover:bg-blue-700">
            Manage Products
        </a>
        <a href="{{ route('admin.categories.index') }}" class="bg-green-600 text-white p-4 rounded-lg text-center hover:bg-green-700">
            Manage Categories
        </a>
        <a href="{{ route('admin.orders.index') }}" class="bg-yellow-600 text-white p-4 rounded-lg text-center hover:bg-yellow-700">
            Manage Orders
        </a>
        <a href="{{ route('admin.products.create') }}" class="bg-purple-600 text-white p-4 rounded-lg text-center hover:bg-purple-700">
            Add New Product
        </a>
    </div>

    <!-- Recent Orders -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-2xl font-bold mb-4">Recent Orders</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead>
                    <tr class="border-b">
                        <th class="text-left py-3 px-4">Order #</th>
                        <th class="text-left py-3 px-4">Customer</th>
                        <th class="text-left py-3 px-4">Amount</th>
                        <th class="text-left py-3 px-4">Status</th>
                        <th class="text-left py-3 px-4">Date</th>
                        <th class="text-left py-3 px-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recentOrders as $order)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-3 px-4">{{ $order->order_number }}</td>
                            <td class="py-3 px-4">{{ $order->user ? $order->user->name : 'Guest' }}</td>
                            <td class="py-3 px-4">PKR {{ number_format($order->total_amount, 2) }}</td>
                            <td class="py-3 px-4">
                                <span class="px-2 py-1 rounded text-sm
                                    {{ $order->status == 'pending' ? 'bg-yellow-200 text-yellow-800' : '' }}
                                    {{ $order->status == 'processing' ? 'bg-blue-200 text-blue-800' : '' }}
                                    {{ $order->status == 'shipped' ? 'bg-purple-200 text-purple-800' : '' }}
                                    {{ $order->status == 'delivered' ? 'bg-green-200 text-green-800' : '' }}
                                    {{ $order->status == 'cancelled' ? 'bg-red-200 text-red-800' : '' }}
                                ">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                            <td class="py-3 px-4">{{ $order->created_at->format('M d, Y') }}</td>
                            <td class="py-3 px-4">
                                <a href="{{ route('admin.orders.show', $order) }}" class="text-blue-600 hover:text-blue-800">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

