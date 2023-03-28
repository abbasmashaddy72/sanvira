<?php

namespace App\Http\Livewire\Frontend\Filters;

use App\Models\SupplierCertificate;
use App\Models\SupplierProduct;
use App\Models\SupplierProject;
use App\Models\SupplierTeam;
use App\Models\SupplierTermCondition;
use App\Models\SupplierTestimonial;
use Livewire\Component;
use Livewire\WithPagination;

class SupplierProfilePage extends Component
{
    use WithPagination;

    // Custom Value Set
    public $profile;
    // Dynamic Value Set
    // Values for Data Set
    public $profileShow = true;
    public $certificatesAwardsShow = false;
    public $projectsShow = false;
    public $teamsShow = false;
    public $testimonialsShow = false;
    public $termsConditionsShow = false;
    public $productsShow = false;

    public function showProfile()
    {
        $this->profileShow = true;
        $this->certificatesAwardsShow = false;
        $this->projectsShow = false;
        $this->teamsShow = false;
        $this->testimonialsShow = false;
        $this->termsConditionsShow = false;
        $this->productsShow = false;
    }

    public function showCertificatesAwards()
    {
        $this->profileShow = false;
        $this->certificatesAwardsShow = true;
        $this->projectsShow = false;
        $this->teamsShow = false;
        $this->testimonialsShow = false;
        $this->termsConditionsShow = false;
        $this->productsShow = false;
    }

    public function showProjects()
    {
        $this->profileShow = false;
        $this->certificatesAwardsShow = false;
        $this->projectsShow = true;
        $this->teamsShow = false;
        $this->testimonialsShow = false;
        $this->termsConditionsShow = false;
        $this->productsShow = false;
    }

    public function showTeams()
    {
        $this->profileShow = false;
        $this->certificatesAwardsShow = false;
        $this->projectsShow = false;
        $this->teamsShow = true;
        $this->testimonialsShow = false;
        $this->termsConditionsShow = false;
        $this->productsShow = false;
    }

    public function showTestimonials()
    {
        $this->profileShow = false;
        $this->certificatesAwardsShow = false;
        $this->projectsShow = false;
        $this->teamsShow = false;
        $this->testimonialsShow = true;
        $this->termsConditionsShow = false;
        $this->productsShow = false;
    }

    public function showTermsConditions()
    {
        $this->profileShow = false;
        $this->certificatesAwardsShow = false;
        $this->projectsShow = false;
        $this->teamsShow = false;
        $this->testimonialsShow = false;
        $this->termsConditionsShow = true;
        $this->productsShow = false;
    }

    public function showProducts()
    {
        $this->profileShow = false;
        $this->certificatesAwardsShow = false;
        $this->projectsShow = false;
        $this->teamsShow = false;
        $this->testimonialsShow = false;
        $this->termsConditionsShow = false;
        $this->productsShow = true;
    }

    public function render()
    {
        $supplier_certificates = SupplierCertificate::where('supplier_id', $this->profile->id)->get();
        $supplier_products = SupplierProduct::where('supplier_id', $this->profile->id)->paginate(6);
        $supplier_projects = SupplierProject::where('supplier_id', $this->profile->id)->get();
        $supplier_teams = SupplierTeam::where('supplier_id', $this->profile->id)->get();
        $supplier_testimonials = SupplierTestimonial::where('supplier_id', $this->profile->id)->orderBy('year', 'ASC')->get();
        $supplier_term_conditions = SupplierTermCondition::where('supplier_id', $this->profile->id)->first('description');

        return view('livewire.frontend.filters.supplier-profile-page', compact([
            'supplier_certificates',
            'supplier_products',
            'supplier_projects',
            'supplier_teams',
            'supplier_testimonials',
            'supplier_term_conditions',
        ]));
    }
}
