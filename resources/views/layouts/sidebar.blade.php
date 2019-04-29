				<aside id="sidebar-left" class="sidebar-left">
				
				    <div class="sidebar-header">
				        <div class="sidebar-title">
				            Navigation
				        </div>
				        <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
				            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
				        </div>
				    </div>
				
				    <div class="nano">
				        <div class="nano-content">
				            <nav id="menu" class="nav-main" role="navigation">
				            
				                <ul class="nav nav-main">
				                    <li>
				                        <a href="/">
				                            <i class="fa fa-home" aria-hidden="true"></i>
				                            <span>Dashboard</span>
				                        </a>                        
				                    </li>

				                    <li>
				                        <a href="/buku">
				                        	<i class="fa fa-book" aria-hidden="true"></i>
				                            <span>Buku</span>
				                        </a>                      
				                    </li>
									
									<li>
				                        <a href="/transaksi">
				                            <i class="fa fa-bar-chart" aria-hidden="true"></i>
				                            <span>Transaksi</span>
				                        </a>                        
				                    </li>
									
				                    @if(Auth::user()->level == 'admin')
				                    <li>
				                        <a href="/member">
				                            <i class="fa fa-users" aria-hidden="true"></i>
				                            <span>Member</span>
				                        </a>                        
				                    </li>

				                    <li>
				                        <a href="/user">
				                            <i class="fa fa-user" aria-hidden="true"></i>
				                            <span>User</span>
				                        </a>                        
				                    </li>
				                    @endif
									
									<li class="nav-parent">
				                        <a href="#">
				                            <i class="fa fa-file-text-o" aria-hidden="true"></i>
				                            <span>Laporan</span>
				                        </a>
				                        <ul class="nav nav-children">
				                        	@if(Auth::user()->level == 'admin')
				                            <li class="nav">
				                                <a href="/laporan/buku">
				                                   Laporan Buku
				                                </a>
				                            </li>
				                            @endif
				                            <li>
				                                <a href="/laporan/transaksi">
				                                    Laporan Transaksi
				                                </a>
				                            </li>
				                        </ul>
				                    </li>
									
				                </ul>
				            </nav>
				        </div>
				    </div>
				</aside>