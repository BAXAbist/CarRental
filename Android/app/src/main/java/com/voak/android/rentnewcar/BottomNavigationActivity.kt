package com.voak.android.rentnewcar

import androidx.fragment.app.Fragment
import android.os.Bundle
import com.google.android.material.bottomnavigation.BottomNavigationView
import androidx.appcompat.app.AppCompatActivity
import com.voak.android.rentnewcar.view.CarsFragmentViewImpl
import com.voak.android.rentnewcar.view.HistoryFragmentViewImpl
import com.voak.android.rentnewcar.view.ProfileFragmentViewImpl


class BottomNavigationActivity : AppCompatActivity() {

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_bottom_navigation)
        val navView: BottomNavigationView = findViewById(R.id.nav_view)

        navView.setOnNavigationItemSelectedListener { item ->
            when (item.itemId) {
                R.id.navigation_cars -> {
                    openFragment(CarsFragmentViewImpl.newInstance())
                    true
                }
                R.id.navigation_history -> {
                    openFragment(HistoryFragmentViewImpl.newInstance())
                    true
                }
                R.id.navigation_profile -> {
                    openFragment(ProfileFragmentViewImpl.newInstance())
                    true
                }
                else -> false
            }
        }
        navView.selectedItemId = R.id.navigation_cars
    }

    private fun openFragment(fragment: Fragment) {
        supportFragmentManager.beginTransaction()
            .replace(R.id.nav_host_fragment, fragment)
//            .addToBackStack(null)
            .commit()
    }
}