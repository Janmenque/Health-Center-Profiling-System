// Customizer


//*** Light & Dark action  ***//
$('.action-dark').click(function () {
	$(this).toggleClass('action-light');
	$('.icon-dark').toggle('');
	$('.icon-light').toggle('');
	$('body').toggleClass('darkmode');
});


//*** Customizer Action ***//
$('.customizer-action').click(function () {
	$('.theme-cutomizer , .customizer-layer').toggleClass('active');
});

$('.customizer-header').click(function () {
	$('.theme-cutomizer , .customizer-layer').toggleClass('active');
});

$('.customizer-layer').click(function () {
	$(this).removeClass('active');
	$('.theme-cutomizer').removeClass('active');
});

//*** Dark Mode ***//
$('.dark-action').click(function () {
	$('body').addClass('darkmode');
    $('#layout_mode').val('darkmode');
});

$('.light-action').click(function () {
	$('body').removeClass('darkmode');
    $('#layout_mode').val('lightmode');
});

$('.customizeoption-list li').click(function () {
	$(this).addClass('active-mode')
	$(this).siblings().removeClass('active-mode');
});


//*** Direction Mode ***//
$('.ltr-action').click(function () {
	$('body').removeClass('rtlmode');
    $('#layout_direction').val('ltrmode');
});
$('.rtl-action').click(function () {
	$('body').addClass('rtlmode');
    $('#layout_direction').val('rtlmode');
});


//*** Sidebar Mode ***//
$('.sidebardark-action').click(function () {
	$('.codex-sidebar').addClass('sidebar-dark');
	$('.codex-sidebar').removeClass('sidebar-gradient');
    $('#sidebar_mode').val('dark');
});
$('.sidebarlight-action').click(function () {
	$('.codex-sidebar').removeClass('sidebar-dark');
	$('.codex-sidebar').removeClass('sidebar-gradient');
    $('#sidebar_mode').val('light');
});
$('.sidebargradient-action').click(function () {
	$('.codex-sidebar').addClass('sidebar-gradient');
    $('#sidebar_mode').val('gradient');
});


//** Theme color mode  ***//
$('.themecolor-list').on('click', '.color1', function () {
	$("#customstyle").attr("href", public_path+"/color1.css");
    $('#theme_color').val('color1');
    $('#color_type').val('default');
	return false;
});
$('.themecolor-list').on('click', '.color2', function () {
	$("#customstyle").attr("href", public_path+"/color2.css");
    $('#theme_color').val('color2');
    $('#color_type').val('default');
	return false;
});
$('.themecolor-list').on('click', '.color3', function () {
	$("#customstyle").attr("href", public_path+"/color3.css");
    $('#theme_color').val('color3');
    $('#color_type').val('default');
	return false;
});
$('.themecolor-list').on('click', '.color4', function () {
	$("#customstyle").attr("href", public_path+"/color4.css");
    $('#theme_color').val('color4');
    $('#color_type').val('default');
	return false;
});
$('.themecolor-list').on('click', '.color5', function () {
	$("#customstyle").attr("href", public_path+"/color5.css");
    $('#theme_color').val('color5');
    $('#color_type').val('default');
	return false;
});
$('.themecolor-list').on('click', '.color6', function () {
	$("#customstyle").attr("href", public_path+"/color6.css");
    $('#theme_color').val('color6');
    $('#color_type').val('default');
	return false;
});
$('.themecolor-list').on('click', '.color7', function () {
	$("#customstyle").attr("href", public_path+"/color7.css");
    $('#theme_color').val('color7');
    $('#color_type').val('default');
	return false;
});
$('.themecolor-list').on('click', '.color8', function () {
	$("#customstyle").attr("href", public_path+"/color8.css");
    $('#theme_color').val('color8');
    $('#color_type').val('default');
	return false;
});
$('.themecolor-list').on('click', '.color9', function () {
	$("#customstyle").attr("href", public_path+"/color9.css");
    $('#theme_color').val('color9');
    $('#color_type').val('default');
	return false;
});

// Function to set the color variable and save to local storage
function setColorAndSave(color) {
	// Convert hex color to RGB
	const rgbColor = hexToRgb(color);
	// Set the RGB CSS variable

    $('#own_color').val('--primary-rgb: '+ rgbColor);
    $('#color_type').val('custom');
	document.documentElement.style.setProperty('--primary-rgb', rgbColor);
	// Save to local storage
	// localStorage.setItem('primaryColor', color);
}

// Function to convert hex color to RGB
function hexToRgb(hex) {
	// Remove the leading '#' if present
	hex = hex.replace('#', '');
	// Convert to RGB
	const bigint = parseInt(hex, 16);
	const r = (bigint >> 16) & 255;
	const g = (bigint >> 8) & 255;
	const b = bigint & 255;
	return `${r},${g},${b}`;
}

// Get the color picker input element
const colorPicker = document.getElementById('colorChange');

// Initialize with the default color from local storage, if available
const savedColor = localStorage.getItem('primaryColor');
if (savedColor) {
	setColorAndSave(savedColor);
	colorPicker.value = savedColor;
}

// Listen for changes in the color picker
colorPicker.addEventListener('input', function (event) {
	const selectedColor = event.target.value;
    $('#own_color_code').val(selectedColor);
	setColorAndSave(selectedColor);
});

const resetButtons = document.querySelectorAll('.color1, .color2, .color3, .color4, .color5, .color6, .color7, .color8, .color9');

// Loop through each reset button and attach click event listener
resetButtons.forEach(function(button) {
    button.addEventListener('click', function() {
        // Remove --primary-rgb from inline style of html tag
        document.documentElement.removeAttribute('style');

        // Remove --primary-rgb from local storage
        // localStorage.removeItem('--primary-rgb');
    });
});
