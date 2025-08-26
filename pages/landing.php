<?php
// Landing page with login/signup functionality
?>

<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 to-indigo-100 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <!-- Logo and title -->
        <div class="text-center">
            <div class="mx-auto h-20 w-20 bg-blue-600 rounded-full flex items-center justify-center">
                <i class="fas fa-graduation-cap text-white text-2xl"></i>
            </div>
            <h2 class="mt-6 text-3xl font-bold text-gray-900">Learn Here Free</h2>
            <p class="mt-2 text-sm text-gray-600">चिकित्सा शिक्षा प्लेटफार्म</p>
        </div>

        <!-- Tab navigation -->
        <div class="bg-white rounded-lg shadow-lg p-6">
            <div class="flex border-b border-gray-200 mb-4">
                <button onclick="showTab('login')" id="loginTab" class="flex-1 py-2 px-4 text-center font-medium text-blue-600 border-b-2 border-blue-600">
                    <i class="fas fa-sign-in-alt mr-2"></i>लॉगिन
                </button>
                <button onclick="showTab('signup')" id="signupTab" class="flex-1 py-2 px-4 text-center font-medium text-gray-500 border-b-2 border-transparent hover:text-gray-700">
                    <i class="fas fa-user-plus mr-2"></i>रजिस्टर
                </button>
            </div>

            <!-- Login Form -->
            <div id="loginForm" class="space-y-4">
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">ईमेल पता</label>
                        <input type="email" id="loginEmail" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="अपना ईमेल दर्ज करें">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">पासवर्ड</label>
                        <input type="password" id="loginPassword" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="अपना पासवर्ड दर्ज करें">
                    </div>
                </div>
                
                <button onclick="handleLogin()" class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <i class="fas fa-sign-in-alt mr-2"></i>लॉगिन करें
                </button>
                
                <div class="text-center">
                    <button onclick="showForgotPassword()" class="text-sm text-blue-600 hover:text-blue-800">
                        पासवर्ड भूल गए?
                    </button>
                </div>

                <!-- Test Credentials -->
                <div class="mt-4 p-3 bg-gray-50 rounded-md text-xs">
                    <p class="font-medium text-gray-700 mb-2">टेस्ट अकाउंट:</p>
                    <div class="space-y-1">
                        <p><strong>Admin:</strong> spguide4you@gmail.com / admin123</p>
                        <p><strong>User:</strong> satya25071998@gmail.com / password</p>
                    </div>
                </div>
            </div>

            <!-- Signup Form -->
            <div id="signupForm" class="space-y-4 hidden">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">पहला नाम</label>
                        <input type="text" id="signupFirstName" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="पहला नाम">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">अंतिम नाम</label>
                        <input type="text" id="signupLastName" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="अंतिम नाम">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">ईमेल पता</label>
                    <input type="email" id="signupEmail" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="अपना ईमेल दर्ज करें">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">पासवर्ड</label>
                    <input type="password" id="signupPassword" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="पासवर्ड (कम से कम 6 अक्षर)">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">पासवर्ड पुष्टि</label>
                    <input type="password" id="signupConfirmPassword" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="पासवर्ड दोबारा दर्ज करें">
                </div>
                
                <button onclick="handleSignup()" class="w-full bg-green-600 text-white py-2 px-4 rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                    <i class="fas fa-user-plus mr-2"></i>रजिस्टर करें
                </button>
            </div>

            <!-- Admin Login Link -->
            <div class="mt-6 text-center border-t pt-4">
                <a href="?page=admin" class="text-sm text-indigo-600 hover:text-indigo-800">
                    <i class="fas fa-crown mr-1"></i>एडमिन लॉगिन
                </a>
            </div>
        </div>
        
        <!-- Forgot Password Modal -->
        <div id="forgotPasswordModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white rounded-lg p-6 w-full max-w-md mx-4">
                <h3 class="text-lg font-medium text-gray-900 mb-4">पासवर्ड रीसेट</h3>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">ईमेल पता</label>
                        <input type="email" id="forgotEmail" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="अपना ईमेल दर्ज करें">
                    </div>
                    <div class="flex space-x-3">
                        <button onclick="handleForgotPassword()" class="flex-1 bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700">
                            रीसेट लिंक भेजें
                        </button>
                        <button onclick="hideForgotPassword()" class="flex-1 bg-gray-300 text-gray-700 py-2 px-4 rounded-md hover:bg-gray-400">
                            रद्द करें
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function showTab(tab) {
    const loginForm = document.getElementById('loginForm');
    const signupForm = document.getElementById('signupForm');
    const loginTab = document.getElementById('loginTab');
    const signupTab = document.getElementById('signupTab');
    
    if (tab === 'login') {
        loginForm.classList.remove('hidden');
        signupForm.classList.add('hidden');
        loginTab.classList.add('text-blue-600', 'border-blue-600');
        loginTab.classList.remove('text-gray-500', 'border-transparent');
        signupTab.classList.add('text-gray-500', 'border-transparent');
        signupTab.classList.remove('text-blue-600', 'border-blue-600');
    } else {
        loginForm.classList.add('hidden');
        signupForm.classList.remove('hidden');
        signupTab.classList.add('text-blue-600', 'border-blue-600');
        signupTab.classList.remove('text-gray-500', 'border-transparent');
        loginTab.classList.add('text-gray-500', 'border-transparent');
        loginTab.classList.remove('text-blue-600', 'border-blue-600');
    }
}

async function handleLogin() {
    const email = document.getElementById('loginEmail').value;
    const password = document.getElementById('loginPassword').value;
    
    if (!email || !password) {
        Toast.show('कृपया सभी फ़ील्ड भरें।', 'error');
        return;
    }
    
    try {
        const result = await API.login(email, password);
        
        if (result.success) {
            Toast.show(result.message, 'success');
            window.location.href = 'index.php';
        } else {
            Toast.show(result.message, 'error');
        }
    } catch (error) {
        Toast.show('लॉगिन में त्रुटि हुई। कृपया पुनः प्रयास करें।', 'error');
    }
}

async function handleSignup() {
    const firstName = document.getElementById('signupFirstName').value;
    const lastName = document.getElementById('signupLastName').value;
    const email = document.getElementById('signupEmail').value;
    const password = document.getElementById('signupPassword').value;
    const confirmPassword = document.getElementById('signupConfirmPassword').value;
    
    if (!firstName || !lastName || !email || !password || !confirmPassword) {
        Toast.show('कृपया सभी फ़ील्ड भरें।', 'error');
        return;
    }
    
    if (password !== confirmPassword) {
        Toast.show('पासवर्ड मेल नहीं खाते।', 'error');
        return;
    }
    
    if (password.length < 6) {
        Toast.show('पासवर्ड कम से कम 6 अक्षर का होना चाहिए।', 'error');
        return;
    }
    
    try {
        const result = await API.signup(firstName, lastName, email, password);
        
        if (result.success) {
            Toast.show(result.message, 'success');
            showTab('login');
            // Pre-fill login form
            document.getElementById('loginEmail').value = email;
        } else {
            Toast.show(result.message, 'error');
        }
    } catch (error) {
        Toast.show('रजिस्ट्रेशन में त्रुटि हुई। कृपया पुनः प्रयास करें।', 'error');
    }
}

function showForgotPassword() {
    document.getElementById('forgotPasswordModal').classList.remove('hidden');
}

function hideForgotPassword() {
    document.getElementById('forgotPasswordModal').classList.add('hidden');
}

async function handleForgotPassword() {
    const email = document.getElementById('forgotEmail').value;
    
    if (!email) {
        Toast.show('कृपया ईमेल पता दर्ज करें।', 'error');
        return;
    }
    
    try {
        const result = await API.request('forgot-password', { email });
        
        if (result.success) {
            Toast.show(result.message, 'success');
            hideForgotPassword();
            
            // If email wasn't sent, show token on screen
            if (!result.email_sent && result.token) {
                alert(`Email service उपलब्ध नहीं है। आपका रीसेट टोकन: ${result.token}\n\nइसे कॉपी करके रीसेट पेज पर जाएं।`);
            }
        } else {
            Toast.show(result.message, 'error');
        }
    } catch (error) {
        Toast.show('रीसेट अनुरोध में त्रुटि हुई।', 'error');
    }
}
</script>