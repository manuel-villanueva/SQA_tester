<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Test Case Form</title>  
    <style>  
        /* CSS Styles */  
        body {  
            font-family: 'Montserrat', sans-serif;  
            background-color: #f5f5f5;  
            margin: 0;  
            padding: 0;  
        }  

        .container {  
            max-width: 900px;  
            margin: 0 auto;  
            padding: 20;  
        }  

        .form-container {  
            background-color: white;  
            border-radius: 8px;  
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);  
            padding: 10rem;  
            animation: fadeIn 0.5s ease-in-out;  
        }  

        .form-group {  
            margin-bottom: 1.5rem;  
        }  

        label {  
            display: block;  
            font-weight: bold;  
            margin-bottom: 0.5rem;  
        }  

        input, select {  
            width: 100%;  
            padding: 0.75rem;  
            border: 1px solid #ccc;  
            border-radius: 4px;  
            font-size: 1rem;  
        }  

        button {  
            background-color: #007bff;  
            color: white;  
            border: none;  
            padding: 0.75rem 1.5rem;  
            border-radius: 4px;  
            font-size: 1rem;  
            cursor: pointer;  
            transition: background-color 0.3s ease-in-out;  
        }  

        button:hover {  
            background-color: #0056b3;  
        }  

        .about-us {  
            margin-top: 3rem;  
            text-align: center;  
            animation: slideUp 0.5s ease-in-out;  
        }  

        .about-us h2 {  
            margin-bottom: 2rem;  
        }  

        .team-member {  
            display: inline-block;  
            width: 200px;  
            margin: 1rem;  
            text-align: center;  
        }  

        .team-member img {  
            width: 100px;  
            height: 100px;  
            border-radius: 50%;  
            object-fit: cover;  
            margin-bottom: 1rem;  
            animation: zoomIn 0.5s ease-in-out;  
        }  

        .team-member h3 {  
            margin-bottom: 0.5rem;  
        }  

        .team-member p {  
            color: #666;  
        }  

        /* Animations */  
        @keyframes fadeIn {  
            0% {  
                opacity: 0;  
            }  
            100% {  
                opacity: 1;  
            }  
        }  

        @keyframes slideUp {  
            0% {  
                transform: translateY(50px);  
                opacity: 0;  
            }  
            100% {  
                transform: translateY(0);  
                opacity: 1;  
            }  
        }  

        @keyframes zoomIn {  
            0% {  
                transform: scale(0.5);  
                opacity: 0;  
            }  
            100% {  
                transform: scale(1);  
                opacity: 1;  
            }  
        }  
    </style>  
</head>  
<body>  
    <div class="container">  
        <div class="form-container">  
            <form method="post" action="process_test_cases.php">  
                <h2>Test Case Information</h2>  

                <div class="form-group">  
                    <label for="fullname">Full Name:</label>  
                    <input type="text" id="fullname" name="fullname" required>  
                </div>  

                <div class="form-group">  
                    <label for="test_case_title">Test Case Title:</label>  
                    <input type="text" id="test_case_title" name="test_case_title" required>  
                </div>  

                <div class="form-group">  
                    <label for="test_cycle">Test Cycle:</label>  
                    <input type="text" id="test_cycle" name="test_cycle" required>  
                </div>  

                <div class="form-group">  
                    <label for="date_of_testing">Date of Testing:</label>  
                    <input type="date" id="date_of_testing" name="date_of_testing" required>  
                </div>  

                <div class="form-group">  
                    <label for="test_data_source">Test Data Source:</label>  
                    <input type="text" id="test_data_source" name="test_data_source" required>  
                </div>  

                <div class="form-group">  
                    <label for="module_of_screen">Module of Screen:</label>  
                    <input type="text" id="module_of_screen" name="module_of_screen" required>  
                </div>  

                <div class="form-group">  
                    <label for="objectives">Objectives:</label>  
                    <input type="text" id="objectives" name="objectives" required>  
                </div>  

                <h3>Test Cases</h3>  
                <div id="test_cases">  
                    <div class="test_case">  
                        <div class="form-group">  
                            <label for="test_case_id">Test Case ID:</label>  
                            <input type="text" name="test_cases[0][test_case_id]" required>  
                        </div>  

                        <div class="form-group">  
                            <label for="description">Description:</label>  
                            <input type="text" name="test_cases[0][description]" required>  
                        </div>  

                        <div class="form-group">  
                            <label for="input_data">Input Data:</label>  
                            <input type="text" name="test_cases[0][input_data]" required>  
                        </div>  

                        <div class="form-group">  
                            <label for="expected_output">Expected Output:</label>  
                            <input type="text" name="test_cases[0][expected_output]" required>  
                        </div>  

                        <div class="form-group">  
                            <label for="actual_output">Actual Output:</label>  
                            <input type="text" name="test_cases[0][actual_output]" required>  
                        </div>  

                        <div class="form-group">  
                            <label for="status">Status:</label>  
                            <input type="text" name="test_cases[0][status]" required>  
                        </div>  

                        <div class="form-group">  
                            <label for="notes">Notes:</label>  
                            <input type="text" name="test_cases[0][notes]" required>  
                        </div>  
                    </div>  
                </div>  
                

                <div class="form-group">  
                    <label for="output_format">Output Format:</label>  
                    <select id="output_format" name="output_format" required>  
                        <option value="docx">DOCX</option>  
                        <option value="pdf">PDF</option>  
                    </select>  
                </div>  
                

                <button type="submit">Generate Document</button>  
            </form>  
        </div>  

        <div class="about-us">  
            <h2>Project Group Member:</h2>  
            <div class="team-member">  
                <img src="https://scontent.fmnl17-2.fna.fbcdn.net/v/t39.30808-6/349062240_1373044786587816_8340594515709707844_n.jpg?_nc_cat=111&ccb=1-7&_nc_sid=a5f93a&_nc_ohc=Rr4pZyvnNygQ7kNvgGnbFAq&_nc_zt=23&_nc_ht=scontent.fmnl17-2.fna&_nc_gid=AWiKfkLcu2SnXHxV9HlxY6h&oh=00_AYD5VWm9SCe3blYXhA8YkFxwq_fcDb-wtvLVeMEnQw9iAA&oe=6760088C" alt="Team Member 1">  
                <h3>Christian D. Villaveza</h3>    
            </div>  
            <div class="team-member">  
                <img src="https://lh3.googleusercontent.com/a-/ALV-UjXwhURXPn8EBeLAFg9i4iC1f2PWlhxzAaN687kawFSrCOhkoFbS=s240-p-k-rw-no" alt="Team Member 2">  
                <h3>Rovic E. Manalang</h3>   
            </div>  
            <div class="team-member">  
                <img src="https://scontent.fmnl17-3.fna.fbcdn.net/v/t39.30808-6/336786737_1166977930629572_3419327206966858918_n.jpg?_nc_cat=103&ccb=1-7&_nc_sid=a5f93a&_nc_ohc=lxGUlpwLoZ8Q7kNvgESsqhE&_nc_zt=23&_nc_ht=scontent.fmnl17-3.fna&_nc_gid=ARueafJLujLy7kPk59fVqA1&oh=00_AYB2aeTa9COdC7YaQMalopwze_x0nQLLEEOP7vJ1lJPTYQ&oe=6760025C" alt="Team Member 3">  
                <h3>Jerome M. Bautista</h3>   
            </div>  
            <div class="team-member">  
                <img src="https://scontent.fmnl17-4.fna.fbcdn.net/v/t39.30808-6/468953256_8568902826492141_5524608514686188064_n.jpg?_nc_cat=104&ccb=1-7&_nc_sid=6ee11a&_nc_ohc=DC0nvKBagUcQ7kNvgHXvkmC&_nc_zt=23&_nc_ht=scontent.fmnl17-4.fna&_nc_gid=AnFkcpWxNPefhi0-rOw-VOP&oh=00_AYDSIVAouDJu3LiS7Ah_pZ4-t415tzsGIn3pyVmLcPO2kQ&oe=6760255A" alt="Team Member 4">  
                <h3>Manuel G. Villanueva</h3>  
            </div>  
        </div>  
    </div>  

    <script>  
        function addTestCase() {  
            let testCasesDiv = document.getElementById('test_cases');  
            let newIndex = testCasesDiv.getElementsByClassName('test_case').length;  
            let newTestCase = document.createElement('div');  
            newTestCase.className = 'test_case';  
            newTestCase.innerHTML = `  
                <div class="form-group">  
                    <label for="test_case_id">Test Case ID:</label>  
                    <input type="text" name="test_cases[${newIndex}][test_case_id]" required>  
                </div>  

                <div class="form-group">  
                    <label for="description">Description:</label>  
                    <input type="text" name="test_cases[${newIndex}][description]" required>  
                </div>  

                <div class="form-group">  
                    <label for="input_data">Input Data:</label>  
                    <input type="text" name="test_cases[${newIndex}][input_data]" required>  
                </div>  

                <div class="form-group">  
                    <label for="expected_output">Expected Output:</label>  
                    <input type="text" name="test_cases[${newIndex}][expected_output]" required>  
                </div>  

                <div class="form-group">  
                    <label for="actual_output">Actual Output:</label>  
                    <input type="text" name="test_cases[${newIndex}][actual_output]" required>  
                </div>  

                <div class="form-group">  
                    <label for="status">Status:</label>  
                    <input type="text" name="test_cases[${newIndex}][status]" required>  
                </div>  

                <div class="form-group">  
                    <label for="notes">Notes:</label>  
                    <input type="text" name="test_cases[${newIndex}][notes]" required>  
                </div>  
            `;  
            testCasesDiv.appendChild(newTestCase);  
        }  
    </script>  
</body>  
</html>