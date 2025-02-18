@extends('layouts.front')
@section('content')
<style>
    /* Profile Container */
    .profile-container {
        max-width: 800px;
        margin: 50px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    /* Profile Header */
    .profile-header {
        text-align: center;
        margin-bottom: 30px;
    }

    .profile-header h1 {
        font-size: 28px;
        font-weight: bold;
        color: #333;
        margin-bottom: 10px;
    }

    .profile-header p {
        font-size: 16px;
        color: #777;
    }

    /* Profile Image */
    .profile-image {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        margin: 0 auto 20px;
        overflow: hidden;
        border: 4px solid #fff;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .profile-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* Profile Details */
    .profile-details {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    .profile-details .detail-card {
        flex: 1 1 calc(50% - 20px);
        background-color: #f9f9f9;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .profile-details .detail-card h3 {
        font-size: 18px;
        font-weight: bold;
        color: #333;
        margin-bottom: 10px;
    }

    .profile-details .detail-card p {
        font-size: 16px;
        color: #555;
        margin: 0;
    }

    /* Edit Button */
    .edit-profile-btn {
        display: inline-block;
        margin-top: 30px;
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        border-radius: 5px;
        text-decoration: none;
        font-size: 16px;
        transition: background-color 0.3s ease;
    }

    .edit-profile-btn:hover {
        background-color: #0056b3;
    }
</style>

<div class="profile-container">
    <!-- Profile Header -->
    <div class="profile-header">
        <div class="profile-image">
            <img src="{{Auth::user()->profile}}" alt="Profile Image">
        </div>
        <h1>{{ Auth::user()->name }}</h1>
        <p>{{ Auth::user()->email }}</p>
    </div>

    <!-- Profile Details -->
    <div class="profile-details">
        <div class="detail-card">
            <h3>Contact Information</h3>
            <p><strong>Phone:</strong> {{Auth::user()->phone}}</p>
            <p><strong>Address:</strong> {{Auth::user()->address}}</p>
        </div>
        @if (Auth::user()->role == 'Super Admin')
            <div class="detail-card">
                <h3>Your Permission</h3>
                <p>You can manage Products' informations, Account Management, Payment Arrange , Order Confirmations in Admin Pannel.</p>
            </div>
        @elseif(Auth::user()->role == 'User')
            <div class="detail-card">
                <h3>Your Permission</h3>
                <p>You can buy products and edit some your profile informations.</p>
            </div>
        @endif 
    </div>

    <!-- Edit Button -->
    <div class="text-center">
        <a href="" class="mt-4 view-button">Edit Profile</a>
    </div>
</div>
@endsection