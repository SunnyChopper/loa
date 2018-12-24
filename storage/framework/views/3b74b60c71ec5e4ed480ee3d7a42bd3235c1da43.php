<!-- Everyone sees the dashboard -->
<li><a href="/admin/dashboard">Dashboard</a></li>

<!-- Blog posts -->
<?php if(\Session::get('backend_auth') == 1 || \Session::get('backend_auth') == 2 || \Session::get('backend_auth') == 3): ?>
<li class="menu-has-children"><a href="/admin/posts/view">Posts</a>
	<ul>
		<li><a href="/admin/posts/view">View Posts</a></li>
		<li><a href="/admin/posts/new">New Post</a></li>
		<li><a href="/admin/posts/stats">Post Stats</a></li>
	</ul>
</li>
<?php endif; ?>

<!-- Courses -->
<?php if(\Session::get('backend_auth') == 1): ?>
<li class="menu-has-children"><a href="/admin/courses/view">Courses</a>
	<ul>
		<li><a href="/admin/courses/view">View Courses</a></li>
		<li><a href="/admin/courses/new">New Course</a></li>
		<li><a href="/admin/courses/stats">Course Stats</a></li>
	</ul>
</li>
<?php endif; ?>

<!-- Voting Polls -->
<?php if(\Session::get('backend_auth') == 1 || \Session::get('backend_auth') == 2): ?>
<li class="menu-has-children"><a href="/admin/content/view">Community</a>
	<ul>
		<li><a href="/admin/discussions/view">View Book Discussions</a></li>
		<li><a href="/admin/discussions/new">New Book Discussion</a></li>
		<li><a href="/admin/discussions/stats">Book Discussion Stats</a></li>
		<li><a href="/admin/voting/view">View Voting Polls</a></li>
		<li><a href="/admin/voting/new">New Voting Poll</a></li>
	</ul>
</li>
<?php endif; ?>

<!-- Events -->
<?php if(\Session::get('backend_auth') == 1 || \Session::get('backend_auth') == 2): ?>
<li class="menu-has-children"><a href="/admin/events/view">Events</a>
	<ul>
		<li><a href="/admin/events/view">View Events</a></li>
		<li><a href="/admin/events/new">New Event</a></li>
		<li><a href="/admin/events/stats">Event Stats</a></li>
	</ul>
</li>
<?php endif; ?>

<!-- Products -->
<?php if(\Session::get('backend_auth') == 1 || \Session::get('backend_auth') == 2): ?>
<li class="menu-has-children"><a href="/admin/products/view">Products</a>
	<ul>
		<li><a href="/admin/products/view">View Products</a></li>
		<li><a href="/admin/products/new">New Product</a></li>
		<li><a href="/admin/products/stats">Product Stats</a></li>
		<li><a href="/admin/promo/view">View Promo Codes</a></li>
		<li><a href="/admin/promo/new">New Promo Code</a></li>
		<li><a href="/admin/promo/stats">Promo Code Stats</a></li>
	</ul>
</li>
<?php endif; ?>

<!-- Orders -->
<?php if(\Session::get('backend_auth') == 1 || \Session::get('backend_auth') == 2 || \Session::get('backend_auth') == 6): ?>
<li><a href="/admin/orders/view">Orders</a></li>
<?php endif; ?>

<!-- Users -->
<?php if(\Session::get('backend_auth') == 1): ?>
<li class="menu-has-children"><a href="/admin/users/view">Users</a>
	<ul>
		<li><a href="/admin/users/view">View Users</a></li>
		<li><a href="/admin/users/new">New User</a></li>
	</ul>
</li>
<?php endif; ?>

<!-- Stats -->
<?php if(\Session::get('backend_auth') == 1 || \Session::get('backend_auth') == 4): ?>
<li class="menu-has-children"><a href="/admin/stats/view">Stats</a>
	<ul>
		<li><a href="/admin/finance/view">Finance</a></li>
		<li><a href="/admin/stats/view">Summary Stats</a></li>
		<li><a href="/admin/stats/full">Full Stats</a></li>
	</ul>
</li>
<?php endif; ?>

<li class="menu-has-children"><a href="/admin/profile"><?php echo e(Auth::user()->first_name); ?></a>
	<ul>
		<li><a href="/members/settings">Settings</a></li>
		<li><a href="/members/logout">Logout</a></li>
	</ul>
</li>