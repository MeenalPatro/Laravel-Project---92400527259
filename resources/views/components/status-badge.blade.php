@php($label = ['expiring' => 'Expiring soon', 'active' => 'Active', 'expired' => 'Expired', 'pending' => 'Pending', 'inactive' => 'Inactive', 'new' => 'New', 'read' => 'Read', 'archived' => 'Archived'][$status] ?? ucfirst($status))
<span class="status-badge status-{{ $status }}"><span class="status-dot"></span>{{ $label }}</span>
