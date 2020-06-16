<?php


use Illuminate\Database\Seeder;
use App\Models\Company\Organisation;

class OrganisationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Organisation::create([
            'name'                  => 'Technology & Engineering Innovation Empowerment Foundation',
            'motto'                 => 'Heart of Courage',
            'acronym'               => 'Teif Foundation',
            'about_us'              => 'The Teif Foundation is a foundation with an objective to impart and advance
                                        education, expertise & industrial skills in the subjects of sustainable engineering and
                                        technology to the young/youths/students, including; changing current views about
                                        engineering, climate change; Agriculture, demonstrating the importance of the
                                        subject; linking education, industry and the community; promoting social inclusion
                                        through engaging and empowering both the fortunate, vulnerable and economically
                                        disadvantaged young/old/youths/students in Kenya.',

            'key_words'             => 'Technology & Engineering Innovation Empowerment Foundation, design, center for
                                        Engineering Innovation & Design, Engineering Innovation Kenya, Kenya, Technical
                                        University of Kenya, TUK University, TUKenya, Consulting University, Power consultants,
                                        Power Engineering, Electronics Engineering, Troubleshooting, repair and Maintenance,
                                        Mechanical Engineering, CNC machines, Electrical, Electricians, TEIF Foundation,
                                        Engineering students Association of the Technical University of Kenya, Youth Empowerment,
                                        Agenda 4, Vision 2030, troubleshooting, hospital repairs, CCTV, short industrial courses,
                                        innovation. ideas, incubation, technology. leadership',

            'vision'                => 'To be a top Technology and Engineering Innovation Empowerment Foundation at imparting appropriate industrial
                                        and practical skills with an effort of creating opportunities, development and production of innovative services
                                        and engineering products to reduce poverty, unemployment, crime rate and most of all solve enyan Agriculture,
                                        all rounda Industrial and Domestic daily Challenges through Engineering Innovations.',

            'mission'               => 'To create employment opportunities, Facilitate the improvement in students’ workplace skills with employers,
                                        Guide its members on the increasingly complex and fast changing world of employment with engineering
                                        knowledge and expertise, Facilitate employers to play an ever increasing role in supporting schools with
                                        their careers education, To provide young people with evidence that impresses future employees,
                                        To facilitate employers to recruit talent that can fully manage their businesses,
                                        To unlock potential and spark enthusiasm for Science, Technology, Engineering and Maths (STEM) through
                                        the excitement of various engineering projects.',

            'mandate'              => 'To train, empower, sensitize the youths/students/organisations/institutons throough implementation of engineering
                                        science & Technology practices and solving the Agriculture, all round Industrial and Domestic daily Challenges
                                        thereby reducing the gap between academia and the industry and also between the public and the industry.',

            'logo'                 => 'teif.png',
            'organisation_email'   => 'info@teiffoundation.tukenya.ac.ke',
            'phone'                => '0714192492',
            'landline'             => '0733777179',
            'website'              => 'teiffoundation.tukenya.ac.ke',
            'active'               => true,
            'address'         => '52428',
            'postalcode_id'   => '80',
            'country_id'      => '1',
            'county_id'       => '47',
            'constituency_id' => '289',
            'ward_id'         => '1457',
        ]);
    }
}
