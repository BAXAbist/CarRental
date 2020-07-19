package com.voak.android.rentnewcar

import androidx.fragment.app.Fragment
import android.os.Bundle
import android.util.Log
import com.google.android.material.bottomnavigation.BottomNavigationView
import androidx.appcompat.app.AppCompatActivity
import com.voak.android.rentnewcar.view.CarsFragmentViewImpl
import com.voak.android.rentnewcar.view.EditInfoFragmentImpl
import com.voak.android.rentnewcar.view.HistoryFragmentViewImpl
import com.voak.android.rentnewcar.view.ProfileFragmentViewImpl


class BottomNavigationActivity : AppCompatActivity(), ProfileFragmentViewImpl.NavigationCallback {

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
                    val fragment = ProfileFragmentViewImpl.newInstance()
                    fragment.setNavigationCallback(this)
                    openFragment(fragment)
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

    override fun navigateToEditInfoFragment(
        login: String,
        firstName: String,
        secondName: String,
        middleName: String,
        address: String,
        phone: String
    ) {

        val fragment: Fragment = EditInfoFragmentImpl.newInstance(
            login,
            firstName,
            secondName,
            middleName,
            phone,
            address
        )

        supportFragmentManager.beginTransaction()
            .replace(R.id.nav_host_fragment, fragment)
            .addToBackStack(null)
            .commit()
    }
}