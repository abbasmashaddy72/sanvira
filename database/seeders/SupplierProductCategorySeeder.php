<?php

namespace Database\Seeders;

use App\Models\SupplierProductCategory;
use Illuminate\Database\Seeder;

class SupplierProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $inputs = [
            [1, 'Concrete', 0],
            [2, 'Masonry', 0],
            [3, 'Metals', 0],
            [4, 'Wood, Plastics, & Composites', 0],
            [5, 'Thermal & Moisture Protection', 0],
            [6, 'Openings', 0],
            [7, 'Finishes', 0],
            [8, 'Specialties Manufacturers', 0],
            [9, 'Equipment Manufacturers', 0],
            [10, 'Furnishings', 0],
            [11, 'Special Construction', 0],
            [12, 'Conveying Equipment', 0],
            [13, 'Fire Suppression', 0],
            [14, 'Plumbing', 0],
            [15, 'HVAC', 0],
            [16, 'Integrated Automation', 0],
            [17, 'Electrical', 0],
            [18, 'Communications', 0],
            [19, 'Electronic Safety & Security', 0],
            [20, 'Earthwork', 0],
            [21, 'Exterior Improvements', 0],
            [22, 'Utilities', 0],
            [24, 'Concrete Forming & Accessories', 1],
            [25, 'Concrete Reinforcing', 1],
            [26, 'Cast-in-Place Concrete', 1],
            [27, 'Precast Concrete', 1],
            [28, 'Grouting', 1],
            [29, 'Unit Masonry', 2],
            [30, 'Stone Assemblies', 2],
            [31, 'Refractory Masonry', 2],
            [32, 'Corrosion-Resistant Masonry', 2],
            [33, 'Manufactured Masonry', 2],
            [34, 'Structural Metal Framing', 3],
            [35, 'Metal Joists', 3],
            [36, 'Metal Decking', 3],
            [37, 'Cold-Formed Metal Framing', 3],
            [38, 'Metal Fabrications', 3],
            [39, 'Decorative Metal', 3],
            [40, 'Rough Carpentry', 4],
            [41, 'Finish Carpentry', 4],
            [42, 'Exterior Carpentry', 4],
            [43, 'Architectural Woodwork', 4],
            [44, 'Structural Plastics', 4],
            [45, 'Composite Fabrications', 4],
            [46, 'Structural Composites', 4],
            [47, 'Dampproofing & Waterproofing', 5],
            [48, 'Thermal Protection', 5],
            [49, 'Roofing & Siding Panels', 5],
            [50, 'Membrane Roofing', 5],
            [51, 'Flashing & Sheet Metal', 5],
            [52, 'Roof & Wall Accessories', 5],
            [53, 'Fire & Smoke Protection', 5],
            [54, 'Joint Protection', 5],
            [55, 'Doors & Frames', 6],
            [56, 'Specialty Doors & Frames', 6],
            [57, 'Entrances, Storefronts, ,& Curtain Walls', 6],
            [58, 'Windows', 6],
            [59, 'Roof Windows & Skylights', 6],
            [60, 'Hardware', 6],
            [61, 'Glazing', 6],
            [62, 'Louvers & Vents', 6],
            [63, 'Plaster & Gypsum Board', 7],
            [64, 'Tiling', 7],
            [65, 'Ceilings', 7],
            [66, 'Flooring', 7],
            [67, 'Wall Finishes', 7],
            [68, 'Acoustic Treatment', 7],
            [69, 'Painting & Coating', 7],
            [70, 'Information Specialties', 8],
            [71, 'Interior Specialties', 8],
            [72, 'Fireplaces & Stoves', 8],
            [73, 'Safety Specialties', 8],
            [74, 'Storage Specialties', 8],
            [75, 'Exterior Specialties', 8],
            [76, 'Other Specialties', 8],
            [77, 'Vehicle & Pedestrian Equipment', 9],
            [78, 'Residential Equipment', 9],
            [79, 'Foodservices Equipment', 9],
            [80, 'Entertainment & Recreation', 9],
            [81, 'Art', 10],
            [82, 'Window Treatments', 10],
            [83, 'Casework', 10],
            [84, 'Furnishings & Accessories', 10],
            [85, 'Furniture', 10],
            [86, 'Multiple Seating', 10],
            [87, 'Other Furnishings', 10],
            [88, 'Special Facility', 11],
            [89, 'Special Purpose', 11],
            [90, 'Special Structures', 11],
            [91, 'Dumbwaiters', 12],
            [92, 'Elevators', 12],
            [93, 'Escalators & Moving Walks', 12],
            [94, 'Lifts', 12],
            [95, 'Turntables', 12],
            [96, 'Scaffolding', 12],
            [97, 'Other Conveying', 12],
            [98, 'Water Based', 13],
            [99, 'Fire Extinguishing', 13],
            [100, 'Fire Pumps', 13],
            [101, 'Fire Suppression Water, Storage', 13],
            [102, 'Plumbing Piping', 14],
            [103, 'Plumbing Equipment', 14],
            [104, 'Plumbing Fixtures', 14],
            [105, 'Pool & Fountain Plumbing Systems', 14],
            [106, 'HVAC Piping & Pumps', 15],
            [107, 'HVAC Air Distribution', 15],
            [108, 'Central Cooling', 15],
            [109, 'Decentralized HVAC', 15],
            [110, 'Network Equipment', 16],
            [111, 'Devices & Controls', 16],
            [112, 'Medium Voltage', 17],
            [113, 'Low Voltage', 17],
            [114, 'Extra Low Voltage', 17],
            [115, 'Power Generation & Storing', 17],
            [116, 'Electrical Protecetion', 17],
            [117, 'Lighting', 17],
            [118, 'Structured Cabling', 18],
            [119, 'Audio-Video Communications', 18],
            [120, 'Access Control', 19],
            [121, 'Electronic Surveillance', 19],
            [122, 'Electronic Detection & Alarm', 19],
            [123, 'Bases, Ballasts, & Paving', 21],
            [124, 'Planting, Irrigation & Wetlands', 21],
            [125, 'Water Utilities', 22],
            [126, 'Sewage', 22],
            [127, 'Stormwater Utilities', 22],
            [128, 'Electrical Utilities', 22],
        ];

        foreach ($inputs as $data) {
            SupplierProductCategory::create([
                'id' => $data[0],
                'name' => $data[1],
                'image' => 'supplier_product_category/' . $data[1] . '.jpg',
                'parent_id' => $data[2],
            ]);
        }
    }
}
