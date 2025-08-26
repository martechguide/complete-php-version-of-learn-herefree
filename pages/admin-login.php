<?php
// Admin login page
?>

<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-purple-50 to-indigo-100 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <!-- Logo and title -->
        <div class="text-center">
            <div class="mx-auto h-20 w-20 bg-purple-600 rounded-full flex items-center justify-center">
                <i class="fas fa-crown text-white text-2xl"></i>
            </div>
            <h2 class="mt-6 text-3xl font-bold text-gray-900">Admin Dashboard</h2>
            <p class="mt-2 text-sm text-gray-600">प्रशासनिक पैनल में प्रवेश</p>
        </div>

        <!-- Admin Login Form -->
        <div class="bg-white rounded-lg shadow-lg p-6">
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Admin Email</label>
                    <input type="email" id="adminEmail" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500" placeholder="Admin email address">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <input type="password" id="adminPassword" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500" placeholder="Admin password">
                </div>
            </div>
            
            <button onclick="handleAdminLogin()" class="w-full mt-6 bg-purple-600 text-white py-2 px-4 rounded-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500">
                <i class="fas fa-sign-in-alt mr-2"></i>Admin Login
            </button>
            
            <!-- Test Credentials -->
            <div class="mt-4 p-3 bg-purple-50 rounded-md text-xs">
                <p class="font-medium text-gray-700 mb-2">Admin Test Account:</p>
                <p><strong>Email:</strong> spguide4you@gmail.com</p>
                <p><strong>Password:</strong> admin123</p>
            </div>
            
            <!-- Back to User Login -->
            <div class="mt-6 text-center border-t pt-4">
                <a href="?page=login" class="text-sm text-purple-600 hover:text-purple-800">
                    <i class="fas fa-arrow-left mr-1"></i>Back to User Login
                </a>
            </div>
        </div>
    </div>
</div>

<script>
async function handleAdminLogin() {
    const email = document.getElementById('adminEmail').value;
    const password = document.getElementById('adminPassword').value;
    
    if (!email || !password) {
        Toast.show('कृपया सभी फ़ील्ड भरें।', 'error');
        return;
    }
    
    try {
        const formData = new FormData();
        formData.append('admin_email', email);
        formData.append('admin_password', password);
        
        const response = await fetch('index.php?page=admin', {
            method: 'POST',
            body: formData
        });
        
        const result = await response.json();
        
        if (result.success) {
            Toast.show(result.message, 'success');
            window.location.href = '?page=admin';
        } else {
            Toast.show(result.message, 'error');
        }
    } catch (error) {
        console.error('Admin login error:', error);
        Toast.show('Admin login failed. Please try again.', 'error');
    }
}

// Auto-fill test credentials for demo
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('adminEmail').value = 'spguide4you@gmail.com';
    document.getElementById('adminPassword').value = 'admin123';
});
</script>