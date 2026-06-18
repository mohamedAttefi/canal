<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\Faq;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin user
        User::create([
            'name' => 'Canal Admin',
            'email' => 'admin@canal.ma',
            'password' => Hash::make('Canal1992@Secure'),
        ]);

        // Services
        Service::create([
            'title' => 'Hardware Sales',
            'description' => 'Vente de matériel informatique de haute qualité adapté aux besoins de votre entreprise.',
            'icon' => 'shopping-cart',
            'features' => ['Computers', 'Laptops', 'Printers', 'Network Equipment', 'Accessories']
        ]);

        Service::create([
            'title' => 'IT Maintenance',
            'description' => 'Garantir la continuité de vos opérations grâce à une maintenance préventive et corrective.',
            'icon' => 'wrench',
            'features' => ['Preventive Maintenance', 'Corrective Maintenance', 'Technical Support', 'Hardware Repair', 'Software Troubleshooting']
        ]);

        Service::create([
            'title' => 'IT Installation',
            'description' => 'Déploiement complet de vos infrastructures réseaux, serveurs et postes de travail sécurisés.',
            'icon' => 'server',
            'features' => ['Network Installation', 'Server Configuration', 'Workstation Deployment', 'Security Solutions', 'Infrastructure Setup']
        ]);

        // Testimonials
        Testimonial::create([
            'client_name' => 'Karim Benjelloun',
            'company_name' => 'Atlas Tech Casablanca',
            'feedback' => 'Canal Informatique gère notre infrastructure réseau depuis des années. Leur réactivité et leur professionnalisme sont impeccables.',
            'rating' => 5,
            'is_featured' => true
        ]);

        // FAQs
        Faq::create([
            'question' => 'Quels sont vos délais d\'intervention pour la maintenance ?',
            'answer' => 'Pour les clients sous contrat de maintenance, nous intervenons dans un délai garanti de moins de 4 heures à Casablanca.',
            'order_index' => 1
        ]);
    }
}